@extends(Config::get('syntara::views.master'))

@section('content')
<script src="{{ asset('packages/mrjuliuss/syntara/assets/js/dashboard/group.js') }}"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans('syntara::groups.new') }}</h3>
            </div>
            <div class="box-body">
                <form class="form" id="create-group-form" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">{{ trans('syntara::groups.name') }}</label>
                                <input class="col-lg-12 form-control" type="text" id="groupname" name="groupname">
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
                                <button id="create-group" class="btn btn-primary">{{ trans('syntara::all.create') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop