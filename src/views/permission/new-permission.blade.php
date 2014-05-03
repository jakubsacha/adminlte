@extends(Config::get('syntara::views.master'))

@section('content')
<script src="{{ asset('packages/mrjuliuss/syntara/assets/js/dashboard/permission.js') }}"></script>
<div class="row">
    <div class="col-lg-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans('syntara::permissions.new') }}</h3>
            </div>
            <form class="form" id="create-permission-form" method="POST">
                <div class="box-body clearfix">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label">{{ trans('syntara::all.name') }}</label>
                                <p><input class="col-lg-12 form-control" type="text" id="name" name="name"></p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{ trans('syntara::permissions.value') }}</label>
                                <p><input class="col-lg-12 form-control" type="text" id="value" name="value"></p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{ trans('syntara::permissions.description') }}</label>
                                <p><input class="col-lg-12 form-control" type="text" id="description" name="description"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button id="add-permission" class="btn btn-primary">{{ trans('syntara::all.create') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop