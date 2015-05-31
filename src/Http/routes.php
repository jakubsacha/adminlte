<?php
/**
 * @author jsacha
 * @since 09/05/15 16:04
 */

Route::group(
    [
        'prefix' => 'administration',
        'is' => 'administrator',
        'middleware' => ['auth', 'acl'],
    ],
    function ()
    {
        Route::controller('accounts', 'AccountsController');
        Route::controller('', 'IndexController');
    }
);
