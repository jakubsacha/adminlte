<?php

return array(
    // layouts
    'master' => 'adminlte::layouts.dashboard.master',
    'header' => 'adminlte::layouts.dashboard.header',
    'left' => 'adminlte::layouts.dashboard.left',
    'content' => 'adminlte::layouts.dashboard.content',

    // dashboard
    'dashboard-index' => 'syntara::dashboard.index',
    'login' => 'adminlte::dashboard.login',
    'error' => 'syntara::dashboard.error',

    // users
    'users-index' => 'adminlte::user.index-user',
    'users-list' => 'adminlte::user.list-users',
    'user-create' => 'adminlte::user.new-user',
    'user-informations' => 'syntara::user.user-informations',
    'user-profile' => 'adminlte::user.show-user',
    'user-activation' => 'syntara::user.activation',

    // groups
    'groups-index' => 'syntara::group.index-group',
    'groups-list' => 'syntara::group.list-groups',
    'group-create' => 'syntara::group.new-group',
    'users-in-group' => 'syntara::group.list-users-group',
    'group-edit' => 'syntara::group.show-group',

    // permissions
    'permissions-index' => 'syntara::permission.index-permission',
    'permissions-list' => 'syntara::permission.list-permissions',
    'permission-create' => 'syntara::permission.new-permission',
    'permission-edit' => 'syntara::permission.show-permission',
);