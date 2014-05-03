@extends(Config::get('adminlte::views.master'))

@section('content')
<script src="{{ asset('packages/mrjuliuss/syntara/assets/js/dashboard/group.js') }}"></script>

@include('syntara::layouts.dashboard.confirmation-modal',  array('title' => trans('syntara::all.confirm-delete-title'), 'content' => trans('syntara::all.confirm-delete-message'), 'type' => 'delete-group'))

<div class="row">
    <div class="col-lg-2">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">{{ trans('syntara::all.search') }}</h3>
            </div>
            <div class="box-body">
                <form id="search-form" onsubmit="return false;">
                    <div class="form-group">
                        <label for="groupIdSearch">{{ trans('syntara::groups.id') }}</label>
                        <input type="text" class="form-control" id="groupIdSearch" name="groupIdSearch">
                    </div>
                    <div class="form-group">
                        <label for="groupnameSearch">{{ trans('syntara::groups.name') }}</label>
                        <input type="text" class="form-control" id="groupnameSearch" name="groupnameSearch">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ trans('syntara::all.search') }}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-10">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ trans('syntara::groups.all') }}</h3>

                <div class="box-tools ">
                    <div class="pull-right">
                        <a id="delete-item" class="btn btn-danger groups">{{ trans('syntara::all.delete') }}</a>
                        <a class="btn btn-info btn-new" href="{{ URL::route('newGroup') }}">{{ trans('syntara::groups.new') }}</a>
                    </div>
                </div>
            </div>
            <div class="box-body ajax-content no-padding">
                @include('adminlte::group.list-groups')
            </div>
        </div>
    </div>

</div>
@stop