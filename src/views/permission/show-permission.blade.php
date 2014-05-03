@extends(Config::get('syntara::views.master'))

@section('content')
<script src="{{ asset('packages/mrjuliuss/syntara/assets/js/dashboard/permission.js') }}"></script>
<div class="row">
    <div class="col-lg-6">
        <section class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ $permission->getId() }} - {{ $permission->getName() }}</h3>
            </div>
            <form class="form" id="edit-permission-form" method="PUT">
                <div class="box-body clearfix">
                    <div class="form-group">
                        <label class="control-label">{{ trans('syntara::all.name') }}</label>
                        <input class="col-lg-12 form-control" type="text" id="name" name="name" value="{{ $permission->getName() }}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">{{ trans('syntara::permissions.value') }}</label>
                        <input class="col-lg-12 form-control" type="text" id="value" name="value" value="{{ $permission->getValue() }}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">{{ trans('syntara::permissions.description') }}</label>
                        <input class="col-lg-12 form-control" type="text" id="description" name="description" value="{{ $permission->getDescription() }}">
                    </div>
                </div>
                <div class="box-footer">
                    <button id="update-permission" class="btn btn-primary">{{ trans('syntara::all.update') }}</button>
                </div>
            </form>
        </section>
    </div>
</div>
@stop