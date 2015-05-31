<?php
/**
 * @author jsacha
 * @since 10/05/15 18:30
 */

namespace jakubsacha\adminlte\Http\Controllers;


use App\User;
use Illuminate\Routing\Controller;
use Psy\Util\Json;

class AccountsController extends Controller
{
    public function getIndex()
    {
        return view('adminlte::accounts.index');
    }

    public function anyData()
    {
        $oQuery = User::take(\Input::get('length'));

        if (\Input::get('search.value'))
        {
            $sLikeWhere = '%'.\Input::get('search.value').'%';
            $oQuery
                ->where('name', 'like', $sLikeWhere)
                ->orWhere('email', 'like', $sLikeWhere);
        }

        $iFilteredCount = $oQuery->count();

        if(\Input::get('start'))
        {
            $oQuery->skip(\Input::get('start'));
        }
        $aData = [];
        foreach ($oQuery->get() as $oUser)
        {
            $aData[] = $oUser->toArray();
        }

        return Json::encode(
            [
                'recordsTotal' => User::count(),
                'recordsFiltered' => $iFilteredCount,
                'data' => $aData,
                'draw' => (int)\Input::get('draw')
            ]
        );
    }
}