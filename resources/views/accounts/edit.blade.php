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
            <div class="ajaxForm">
                @include('adminlte::accounts.edit.account')
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
            <div class="ajaxForm">
                @include('adminlte::accounts.edit.password')
            </div>
        </div>
    </div>
@endsection