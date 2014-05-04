<table class="table table-hover">
<thead>
    <tr>
        <th class="col-lg-1" style="text-align: center;"><input type="checkbox" class="check-all"></th>
        <th class="col-lg-1" style="text-align: center;">#</th>
        <th class="col-lg-2">{{ trans('syntara::all.name') }}</th>
        <th>{{ trans('syntara::navigation.permissions') }}</th>
    </tr>
</thead>
<tbody>
    @foreach ($groups as $group)
    <tr onclick="document.location='{{ URL::route('showGroup', $group->getId())}}'">
        <td style="text-align: center;">
            <input type="checkbox" data-group-id="{{ $group->getId(); }}">
        </td>
        <td style="text-align: center;">{{ $group->getId() }}</td>
        <td>{{ $group->getName() }}</td>
        <td>{{ json_encode($group->getPermissions()) }}</td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="box-footer">
    {{ $groups->links(); }}
</div>