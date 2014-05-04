@extends(Config::get('syntara::views.master'))

@section('content')
<script src="{{ asset('packages/mrjuliuss/syntara/assets/js/dashboard/group.js') }}"></script>
<div class="row">
    <div class="col-lg-6">
        <section class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ $group->getId() }} - {{ $group->name }}</h3>
            </div>
            <div class="box-body">
                <form class="form" id="edit-group-form" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">{{ trans('syntara::groups.name') }}</label>
                                <input class="col-lg-12 form-control" type="text" id="groupname" name="groupname" value="{{ $group->name }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            @if($currentUser->hasAccess('permissions-management'))
                            @include('syntara::layouts.dashboard.permissions-select', array('permissions'=> $permissions))
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="control-group">
                                <button id="update-group" class="btn btn-primary">{{ trans('syntara::all.update') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <div class="col-lg-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ trans('syntara::groups.groups-users-title') }}</h3>
                <div class="box-tools">
                    <div class="pull-right">
                        <a id="delete-item" class="btn btn-danger users">{{ trans('syntara::all.delete') }}</a>
                    </div>
                </div>
            </div>
            <div class="box-body ajax-content no-padding clearfix">
                @include('adminlte::group.list-users-group')
            </div>
        </div>
    </div>
</div>
@stop
