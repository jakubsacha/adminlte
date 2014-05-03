@extends(Config::get('syntara::views.master'))

@section('content')
<script src="{{ asset('packages/mrjuliuss/syntara/assets/js/dashboard/permission.js') }}"></script>
@include('syntara::layouts.dashboard.confirmation-modal',  array('title' => trans('syntara::all.confirm-delete-title'), 'content' => trans('syntara::all.confirm-delete-message'), 'type' => 'delete-permission'))
<div class="row">
    <div class="col-lg-2">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ trans('syntara::all.search') }}</h3>
            </div>
            <div class="box-body">
                <form id="search-form" onsubmit="return false;">
                    <div class="form-group">
                        <label for="permissionIdSearch">{{ trans('syntara::permissions.id') }}</label>
                        <input type="text" class="form-control" id="permissionIdSearch" name="permissionIdSearch">
                    </div>
                    <div class="form-group">
                        <label for="permissionNameSearch">{{ trans('syntara::all.name') }}</label>
                        <input type="text" class="form-control" id="permissionNameSearch" name="permissionNameSearch">
                    </div>
                    <div class="form-group">
                        <label for="permissionValueSearch">{{ trans('syntara::permissions.value') }}</label>
                        <input type="text" class="form-control" id="permissionValueSearch" name="permissionValueSearch">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ trans('syntara::all.search') }}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-10">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ trans('syntara::permissions.all') }}</h3>
                <div class="box-tools">
                    

                    <div class="pull-right">
                        @if($currentUser->hasAccess('permissions-management'))
                        <a id="delete-item" class="btn btn-danger">{{ trans('syntara::all.delete') }}</a>
                        @endif

                        @if($currentUser->hasAccess('permissions-management'))
                        <a class="btn btn-info btn-new" href="{{ URL::route('newPermission') }}">{{ trans('syntara::permissions.new') }}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="box-body ajax-content no-padding">
                @include('adminlte::permission.list-permissions')
            </div>
        </div>
    </div>
</div>
@stop