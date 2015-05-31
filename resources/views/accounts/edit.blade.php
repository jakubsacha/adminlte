@extends('adminlte::app')

@section('title')
    Edit account - Administration
@endsection

@section('header')
    Edit account
@endsection

@section('breadcrumb')
    <li><a href="{{ action('\jakubsacha\adminlte\Http\Controllers\AccountsController@getIndex') }}"><i class="fa fa-users"></i> Accounts</a></li>
    <li class="active"><i class="fa fa-user"></i> Edit account</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Account</h3>
                </div>
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" value="{{ $oUser->name }}" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" value="{{ $oUser->email }}" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Account details</h3>
                </div>
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Created at</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control" value="{{ $oUser->created_at }}" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Updated at</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control" value="{{ $oUser->updated_at }}" placeholder="Password">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Reset password</h3>
                </div>
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">New password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" placeholder="New password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Repeat</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password2" placeholder="Repeat">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-warning pull-right">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

    </script>
@endsection