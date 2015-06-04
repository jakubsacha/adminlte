<?php
/**
 * @author jsacha
 * @since 04/06/15 19:56
 */

namespace jakubsacha\adminlte\Http\Controllers;

use Illuminate\Routing\Controller;
use jakubsacha\adminlte\Repository\Role\RolesListRepository;
use jakubsacha\adminlte\Repository\Role\RolesListRepository\GetDataCriteria;
use Psy\Util\Json;

class RolesController extends Controller
{
    public function getIndex()
    {
        return view('adminlte::roles.index');
    }

    public function anyData(RolesListRepository $oRolesListRepository)
    {
        $oCriteria = new GetDataCriteria(
            \Input::get('length'),
            \Input::get('start'),
            \Input::get('search.value')
        );

        $oResult = $oRolesListRepository->getData($oCriteria);

        return Json::encode(
            [
                'recordsTotal' => $oResult->getRecordsTotal(),
                'recordsFiltered' => $oResult->getRecordsFiltered(),
                'data' => $oResult->getData(),
                'draw' => (int)\Input::get('draw')
            ]
        );
    }


    public function getEdit($iRoleId)
    {

    }

    public function getDelete($iRoleId)
    {

    }
}