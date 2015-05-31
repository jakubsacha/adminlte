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


        if(\Input::get('start'))
        {
            $oQuery->skip(\Input::get('start'));
        }
        foreach ($oQuery->get() as $oUser)
        {
            $aData[] = $oUser->toArray();
        }

        return Json::encode(
            [
                'recordsTotal' => User::count(),
                'recordsFiltered' => User::count(),
                'data' => $aData,
                'draw' => (int)\Input::get('draw')
            ]
        );
    }
}