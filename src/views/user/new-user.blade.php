@extends(Config::get('syntara::views.master'))

@section('content')
<script src="{{ asset('packages/mrjuliuss/syntara/assets/js/dashboard/user.js') }}"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header">
                <h1 class="box-title">{{ trans('syntara::users.new') }}</h1>
            </div>
            <div class="box-body">
                <form class="form" id="create-user-form" method="POST">
                    <div class="row-fluid">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">{{ trans('syntara::users.username') }}</label>
                                <p><input class="col-lg-12 form-control" type="text" placeholder="{{ trans('syntara::users.username') }}" id="username" name="username"></p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{ trans('syntara::all.email') }}</label>
                                <p><input class="col-lg-12 form-control" type="text" placeholder="{{ trans('syntara::all.email') }}" id="email" name="email"></p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{ trans('syntara::all.password') }}</label>
                                <p><input class="col-lg-12 form-control" type="password" placeholder="{{ trans('syntara::all.password') }}" id="pass" name="pass"></p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{ trans('syntara::users.last-name') }}</label>
                                <p><input class="col-lg-12 form-control" type="text" placeholder="{{ trans('syntara::users.last-name') }}" id="last_name" name="last_name"></p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{ trans('syntara::users.first-name') }}</label>
                                <p><input class="col-lg-12 form-control" type="text" placeholder="{{ trans('syntara::users.first-name') }}" id="first_name" name="first_name"></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            @if($currentUser->hasAccess('user-group-management'))
                            <label class="control-label">{{ trans('syntara::users.groups') }}</label>
                            <div class="form-group">
                                @foreach($groups as $group)
                                <label class="checkbox">
                                    <input type="checkbox" id="groups[{{ $group->getId() }}]" name="groups[]" value="{{ $group->getId() }}"> {{ $group->getName() }}
                                </label>
                                @endforeach
                            </div>
                            @endif
                            <div class="form-group">
                                @if($currentUser->hasAccess('permissions-management'))
                                @include('syntara::layouts.dashboard.permissions-select', array('permissions'=> $permissions))
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-right">
                                <button id="add-user" class="btn btn-primary" style="margin-top: 15px;">{{ trans('syntara::all.create') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop