<li class="active">
    <a href="{{ action('\jakubsacha\adminlte\Http\Controllers\IndexController@getIndex') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
    </a>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-users"></i>
        <span>Accounts &amp; Permissions</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ action('\jakubsacha\adminlte\Http\Controllers\AccountsController@getIndex') }}"><i class="fa fa-user"></i> Accounts</a></li>
        <li><a href="pages/charts/morris.html"><i class="fa fa-toggle-on"></i> Roles</a></li>
        <li><a href="pages/charts/flot.html"><i class="fa fa-key"></i> Permissions</a></li>
    </ul>
</li>