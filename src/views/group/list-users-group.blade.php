<table class="table table-hover">
    <thead>
        <tr>
            @if($currentUser->hasAccess('user-group-management'))
            <th style="width:20px; text-align: center;"><input type="checkbox" class="check-all"></th>
            @endif
            <th style="width:20px; text-align: center;">ID</th>
            <th style="width:200px;">{{ trans('syntara::users.username') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(!count($users))
        <tr><td colspan="5">{{trans("adminlte::all.none")}}</td></tr>
        @endif
        @foreach ($users as $user)
        <tr onclick="location.href='{{ URL::route('showUser', $user->getId()); }}';">
            @if($currentUser->hasAccess('user-group-management'))
            <td style="text-align: center;">
                <input type="checkbox" data-user-id="{{ $user->getId() }}">
            </td>
            @endif
            <td style="text-align: center;">{{ $user->getId() }}</td>
            <td>&nbsp;{{ $user->username }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot><tr><td colspan="5">{{ $users->links() }}</td></tr></tfoot>
</table>

@if(!empty($candidateUsers) && $currentUser->hasAccess('user-group-management'))
<div class="padding-left-lg">
    <div class="col-lg-6" style="margin-bottom: 15px;">
        <select class="form-control" id="ungrouped-users-list" data-group-id="{{ $group->getId() }}">
            @foreach($candidateUsers as $user)
            <option value="{{ $user->getId() }}">{{ $user->username}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4">
        <button id="add-user" type="button" class="btn btn-primary">{{ trans('syntara::groups.add-user') }}</button>
    </div>
</div>
@endif
