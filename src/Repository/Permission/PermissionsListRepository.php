<?php
/**
 * @author jsacha
 * @since 31/05/15 17:49
 */

namespace jakubsacha\adminlte\Repository\Permission;

use jakubsacha\adminlte\Repository\Permission\PermissionsListRepository\GetDataCriteria;
use jakubsacha\adminlte\Repository\Permission\PermissionsListRepository\GetDataResult;
use Kodeine\Acl\Models\Eloquent\Permission;

class PermissionsListRepository
{
    /**
     * @param GetDataCriteria $oCriteria
     * @return GetDataResult
     */
    public function getData(GetDataCriteria $oCriteria)
    {
        $oQuery = Permission::take($oCriteria->getLimit());

        if ($oCriteria->getSearchQuery())
        {
            $sLikeWhere = '%' . $oCriteria->getSearchQuery() . '%';
            $oQuery
                ->where('name', 'like', $sLikeWhere)
                ->orWhere('email', 'like', $sLikeWhere);
        }

        $iFilteredCount = $oQuery->count();

        if ($oCriteria->getOffset())
        {
            $oQuery->skip($oCriteria->getOffset());
        }
        $aData = [];

        foreach ($oQuery->get() as $oUser)
        {
            $aUser = $oUser->toArray();
            $aUser['edit_url'] = action(
                '\jakubsacha\adminlte\Http\Controllers\RolesController@getEdit',
                $oUser->id
            );
            $aUser['delete_url'] = action(
                '\jakubsacha\adminlte\Http\Controllers\RolesController@getDelete',
                $oUser->id
            );
            $aData[] = $aUser;
        }

        return new GetDataResult(
            Permission::count(),
            $iFilteredCount,
            $aData
        );
    }
}