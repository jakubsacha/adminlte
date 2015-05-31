@extends('adminlte::app')

@section('title')
    Accounts - Administration
@endsection

@section('header')
    Accounts
@endsection

@section('breadcrumb')
    <li class="active"><i class="fa fa-users"></i> Accounts</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="accounts" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created date</th>
                            <th>Last edit date</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#accounts').dataTable( {
                "dataSrc": '',
                "serverSide": true,
                "type": "POST",
                "processing": true,
                "ajax": '{{ action('\jakubsacha\adminlte\Http\Controllers\AccountsController@anyData') }}',
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "created_at" },
                    { "data": "updated_at" }
                ]
            } );
        } );
    </script>
@endsection