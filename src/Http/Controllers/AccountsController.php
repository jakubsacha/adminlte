<?php
/**
 * @author jsacha
 * @since 10/05/15 18:30
 */

namespace jakubsacha\adminlte\Http\Controllers;


use App\User;
use Illuminate\Routing\Controller;
use jakubsacha\adminlte\Repository\User\AccountsManagementRepository\GetDataCriteria;
use jakubsacha\adminlte\Repository\User\AccountsManagementRepository;
use Psy\Util\Json;

class AccountsController extends Controller
{
    public function getIndex()
    {
        return view('adminlte::accounts.index');
    }

    public function anyData(AccountsManagementRepository $oAccountsManagementRepository)
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

        return \Redirect::back();
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