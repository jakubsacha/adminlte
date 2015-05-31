<?php
/**
 * @author jsacha
 * @since 31/05/15 17:49
 */

namespace jakubsacha\adminlte\Repository\User;

use App\User;
use jakubsacha\adminlte\Repository\User\AccountsManagementRepository\GetDataCriteria;
use jakubsacha\adminlte\Repository\User\AccountsManagementRepository\GetDataResult;

class AccountsManagementRepository
{
    /**
     * @param GetDataCriteria $oCriteria
     * @return GetDataResult
     */
    public function getData(GetDataCriteria $oCriteria)
    {
        $oQuery = User::take($oCriteria->getLimit());

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
                '\jakubsacha\adminlte\Http\Controllers\AccountsController@getEdit',
                $oUser->id
            );
            $aUser['delete_url'] = action(
                '\jakubsacha\adminlte\Http\Controllers\AccountsController@getDelete',
                $oUser->id
            );
            $aData[] = $aUser;
        }

        return new GetDataResult(
            User::count(),
            $iFilteredCount,
            $aData
        );
    }
}