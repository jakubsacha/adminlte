<table class="table table-hover">
    <thead>
        <tr>
            @if($currentUser->hasAccess('permissions-management'))
            <th class="col-lg-1" style="text-align: center;"><input type="checkbox" class="check-all"></th>
            @endif
            <th class="col-lg-1" style="text-align: center;">#</th>
            <th class="col-lg-2">{{ trans('syntara::all.name') }}</th>
            <th class="col-lg-2">{{ trans('syntara::permissions.value') }}</th>
            <th>{{ trans('syntara::permissions.description') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permission)
        <tr <?php if ($currentUser->hasAccess('permissions-management')): ?> onclick="location.href ='{{ URL::route('showPermission', $permission->getId()) }}'" <?php endif; ?>>
            @if($currentUser->hasAccess('permissions-management'))
            <td style="text-align: center;">
                <input type="checkbox" data-permission-id="{{ $permission->getId(); }}">
            </td>
            @endif
            <td style="text-align: center;">{{ $permission->getId() }}</td>
            <td>&nbsp;{{ $permission->getName() }}</td>
            <td>&nbsp;{{ $permission->getValue() }}</td>
            <td>&nbsp;{{ $permission->getDescription() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="box-footer">
    {{ $permissions->links(); }}
</div>