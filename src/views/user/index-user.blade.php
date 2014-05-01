@extends(Config::get('syntara::views.master'))

@section('content')
<script src="{{ asset('packages/mrjuliuss/syntara/assets/js/dashboard/user.js') }}"></script>

@include('syntara::layouts.dashboard.confirmation-modal', array('title' => trans('syntara::all.confirm-delete-title'), 'content' => trans('syntara::all.confirm-delete-message'), 'type' => 'delete-user'))

<div class="row">
    <div class="col-lg-12">
        <div class="box box-warning collapsed-box">
            <div class="box-header">

                <h3 class="box-title">{{ trans('syntara::all.search') }}</h3>
                <div class="pull-right box-tools">
                    <button class="btn btn-warning btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body" style="display: none;">
                <form id="search-form"  onsubmit="return false;">
                    <div class="form-group">
                        <label for="userIdSearch">{{ trans('syntara::users.id') }}</label>
                        <input type="text" class="form-control" id="userIdSearch" name="userIdSearch">
                    </div>
                    <div class="form-group">
                        <label for="usernameSearch">{{ trans('syntara::users.username') }}</label>
                        <input type="text" class="form-control" id="usernameSearch" name="usernameSearch">
                    </div>
                    <div class="form-group">
                        <label for="emailSearch">{{ trans('syntara::all.email') }}</label>
                        <input type="email" class="form-control" id="emailSearch" name="emailSearch">
                    </div>
                    <div class="form-group">
                        <label for="bannedSearch">{{ trans('syntara::users.banned') }}</label>
                        <select class="form-control" id="bannedSearch" name="bannedSearch">
                            <option>--</option>
                            <option value="0">{{ trans('syntara::all.no') }}</option>
                            <option value="1">{{ trans('syntara::all.yes') }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ trans('syntara::all.search') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ trans('syntara::users.all') }}</h3>
            </div>
            <div class="box-body  ajax-content">
                @include('adminlte::user.list-users')
            </div>
        </div>
    </div>
</div>


@stop