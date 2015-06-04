<?php
/**
 * @author jsacha
 * @since 31/05/15 17:49
 */

namespace jakubsacha\adminlte\Repository\Role;

use App\User;
use jakubsacha\adminlte\Repository\Role\RolesListRepository\GetDataCriteria;
use jakubsacha\adminlte\Repository\Role\RolesListRepository\GetDataResult;
use Kodeine\Acl\Models\Eloquent\Role;

class RolesListRepository
{
    /**
     * @param GetDataCriteria $oCriteria
     * @return GetDataResult
     */
    public function getData(GetDataCriteria $oCriteria)
    {
        $oQuery = Role::take($oCriteria->getLimit());

        if ($oCriteria->getSearchQuery())
        {
            $sLikeWhere = '%' . $oCriteria->getSearchQuery() . '%';
            $oQuery
                ->where('name', 'like', $sLikeWhere)
                ->orWhere('slug', 'like', $sLikeWhere)
                ->orWhere('description', 'like', $sLikeWhere);
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
            Role::count(),
            $iFilteredCount,
            $aData
        );
    }
}