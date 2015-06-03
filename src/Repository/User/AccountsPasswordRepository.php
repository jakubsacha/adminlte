<?php
/**
 * @author jsacha
 * @since 03/06/15 22:19
 */

namespace jakubsacha\adminlte\Repository\User;


use App\User;

class AccountsPasswordRepository
{
    public function editPassword(User $oUser, $sPassword)
    {
        $oUser->password = bcrypt($sPassword);
        $oUser->save();
        return $oUser;
    }
}