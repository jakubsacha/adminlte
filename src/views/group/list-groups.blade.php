<table class="table">
<thead>
    <tr>
        <th class="col-lg-1" style="text-align: center;"><input type="checkbox" class="check-all"></th>
        <th class="col-lg-1" style="text-align: center;">#</th>
        <th class="col-lg-2">{{ trans('syntara::all.name') }}</th>
        <th>{{ trans('syntara::navigation.permissions') }}</th>
        <th class="col-lg-1" style="text-align: center;">&nbsp;</th>
    </tr>
</thead>
<tbody>
    @foreach ($groups as $group)
    <tr>
        <td style="text-align: center;">
            <input type="checkbox" data-group-id="{{ $group->getId(); }}">
        </td>
        <td style="text-align: center;">{{ $group->getId() }}</td>
        <td>{{ $group->getName() }}</td>
        <td>{{ json_encode($group->getPermissions()) }}</td>
        <td style="text-align: center;">&nbsp;<a href="{{ URL::route('showGroup', $group->getId())}}">{{ trans('syntara::all.show') }}</a></td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="box-footer">
    {{ $groups->links(); }}
</div>