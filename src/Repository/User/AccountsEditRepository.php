<?php
/**
 * @author jsacha
 * @since 03/06/15 22:19
 */

namespace jakubsacha\adminlte\Repository\User;


use App\User;

class AccountsEditRepository
{
    public function editUser(User $oUser, $aInput)
    {
        $oUser->fill(array_intersect_key($aInput, array_flip(['name', 'email'])));
//        $oUser->fill($aInput);
        $oUser->save();

        return $oUser;
    }
}