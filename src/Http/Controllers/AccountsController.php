<?php
/**
 * @author jsacha
 * @since 10/05/15 18:30
 */

namespace jakubsacha\adminlte\Http\Controllers;


use App\User;
use Illuminate\Contracts\Support\MessageProvider;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Routing\Controller;
use jakubsacha\adminlte\Repository\User\AccountsEditRepository;
use jakubsacha\adminlte\Repository\User\AccountsListRepository\GetDataCriteria;
use jakubsacha\adminlte\Repository\User\AccountsListRepository;
use jakubsacha\adminlte\Repository\User\AccountsPasswordRepository;
use Psy\Util\Json;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function getIndex()
    {
        return view('adminlte::accounts.index');
    }

    public function anyData(AccountsListRepository $oAccountsManagementRepository)
    {
        $oCriteria = new GetDataCriteria(
            \Input::get('length'),
            \Input::get('start'),
            \Input::get('search.value')
        );

        $oResult = $oAccountsManagementRepository->getData($oCriteria);

        return Json::encode(
            [
                'recordsTotal' => $oResult->getRecordsTotal(),
                'recordsFiltered' => $oResult->getRecordsFiltered(),
                'data' => $oResult->getData(),
                'draw' => (int)\Input::get('draw')
            ]
        );
    }

    public function getEdit($iUserId)
    {
        $oUser = $this->getUser($iUserId);

        return view('adminlte::accounts.edit')->with('oUser', $oUser);
    }

    public function anyEditAccount($iUserId, AccountsEditRepository $oAccountsEditRepository, Request $oRequest)
    {
        $oUser = $this->getUser($iUserId);
        $oView = view('adminlte::accounts.edit.account')->with('oUser', $oUser);
        try
        {
            $oV = \Validator::make(
                $oRequest->all(),
                [
                    'name' => 'required|max:255',
                    'email' => 'required|unique:users,email,' . $iUserId . '|email',
                ]
            );
            if ($oV->fails())
            {
                throw new ValidationException($oV);
            }

            $oAccountsEditRepository->editUser($oUser, $oRequest->all());

            $oView->with('success', true);

        } catch (ValidationException $e)
        {
            $oUser->fill($oRequest->all());
            $oView->withErrors($e->getMessageProvider()->getMessageBag());
        }

        return $oView;
    }

    public function anyEditPassword(
        $iUserId,
        AccountsPasswordRepository $oAccountsPasswordRepository,
        Request $oRequest
    ) {
        $oUser = $this->getUser($iUserId);

        $oView = view('adminlte::accounts.edit.password')->with('oUser', $oUser);
        try
        {
            $oV = \Validator::make(
                $oRequest->all(),
                ['password' => 'required|confirmed|max:255|min:6']
            );
            if ($oV->fails())
            {
                throw new ValidationException($oV);
            }

            $oAccountsPasswordRepository->editPassword($oUser, $oRequest->get('password'));

            $oView->with('success', true);

        } catch (ValidationException $e)
        {
            $oUser->fill($oRequest->all());
            $oView->withErrors($e->getMessageProvider()->getMessageBag());
        }

        return $oView;
    }

    public function getDelete($iUserId)
    {
        $oUser = $this->getUser($iUserId);
        $oUser->delete();

        \Session::flash("message", 'Account has been removed');

        return \Redirect::back();
    }

    /**
     * @param $iUserId
     * @return \App\User
     */
    private function getUser($iUserId)
    {
        $oUser = User::find($iUserId);

        if (empty($oUser))
        {
            abort(404);
        }

        return $oUser;
    }
}