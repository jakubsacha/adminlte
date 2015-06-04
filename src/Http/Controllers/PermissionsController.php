<?php
/**
 * @author jsacha
 * @since 04/06/15 19:56
 */

namespace jakubsacha\adminlte\Http\Controllers;

use Illuminate\Routing\Controller;
use jakubsacha\adminlte\Repository\Permission\PermissionsListRepository;
use jakubsacha\adminlte\Repository\Permission\PermissionsListRepository\GetDataCriteria;
use Kodeine\Acl\Models\Eloquent\Permission;
use Psy\Util\Json;

class PermissionsController extends Controller
{
    public function getIndex()
    {
        return view('adminlte::permissions.index');
    }

    public function anyData(PermissionsListRepository $oRolesListRepository)
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


    public function getEdit($iPermissionId)
    {

    }

    public function getDelete($iPermissionId)
    {

    }
}