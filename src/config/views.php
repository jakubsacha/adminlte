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
    'groups-index' => 'adminlte::group.index-group',
    'groups-list' => 'adminlte::group.list-groups',
    'group-create' => 'adminlte::group.new-group',
    'users-in-group' => 'adminlte::group.list-users-group',
    'group-edit' => 'adminlte::group.show-group',

    // permissions
    'permissions-index' => 'adminlte::permission.index-permission',
    'permissions-list' => 'adminlte::permission.list-permissions',
    'permission-create' => 'adminlte::permission.new-permission',
    'permission-edit' => 'adminlte::permission.show-permission',
);