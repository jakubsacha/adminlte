<table class="table table-hover">
    <thead>
        <tr>
            @if($currentUser->hasAccess('delete-user'))
            <th class="col-lg-1" style="text-align: center;"><input type="checkbox" class="check-all"></th>
            @endif
            <th class="col-lg-1 hidden-xs" style="text-align: center;">#</th>
            <th class="col-lg-1">{{ trans('syntara::users.username') }}</th>
            <th class="col-lg-2 visible-lg visible-xs">{{ trans('syntara::all.email') }}</th>
            <th class="col-lg-2 hidden-xs">{{ trans('syntara::users.groups') }}</th>
            <th class="col-lg-2 hidden-xs">{{ trans('syntara::users.permissions') }}</th>
            <th class="col-lg-1 visible-lg">{{ trans('syntara::all.name') }}</th>
            <th class="col-lg-1 hidden-xs">{{ trans('syntara::users.activated') }}</th>
            @if($currentUser->hasAccess('update-user-info'))
            <th class="col-lg-1 hidden-xs">{{ trans('syntara::users.banned') }}</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @if (!count($datas['users']))
        <tr><td colspan="10">
            No records found!
            </td></tr>
        @endif
        @foreach ($datas['users'] as $user)
        <?php
        $throttle = $throttle = Sentry::findThrottlerByUserId($user->getId());
        ?>
        <tr onclick="document.location='{{ URL::route('showUser', $user->getId()) }}';">
            @if($currentUser->hasAccess('delete-user'))
            <td style="text-align: center;">
                <input type="checkbox" data-user-id="{{ $user->getId(); }}">
            </td>
            @endif
            <td class="hidden-xs" style="text-align: center;">{{ $user->getId() }}</td>
            <td >&nbsp;{{ $user->username }}</td>
            <td class="visible-xs visible-lg">&nbsp;{{ $user->getLogin() }}</td>
            <td class="hidden-xs">
                @foreach($user->getGroups()->toArray() as $key => $group)
                {{ $group['name'] }},
                @endforeach
            </td>
            <td class="hidden-xs">{{ json_encode($user->getPermissions()) }}</td>
            <td class="visible-lg">&nbsp;{{ $user->last_name }} {{ $user->first_name }}</td>
            <td class="hidden-xs">{{ $user->isActivated() ? trans('syntara::all.yes') : '<a class="activate-user" href="#" data-toggle="tooltip" title="'.trans('syntara::users.activate').'">'.trans('syntara::all.no').'</a>'}}</td>
            @if($currentUser->hasAccess('update-user-info'))
            <td class="hidden-xs">{{ $throttle->isBanned() ? trans('syntara::all.yes') : trans('syntara::all.no')}}</td>        
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

<div class="box-footer">
    {{ $datas['users']->links(); }}
</div>