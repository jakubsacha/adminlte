@extends('adminlte::app')

@section('title')
    Permissions - Administration
@endsection

@section('header')
    Permissions
@endsection

@section('breadcrumb')
    <li class="active"><i class="fa fa-key"></i> Permissions</li>
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
                            <th>Description</th>
                            <th>Created date</th>
                            <th>Last edit date</th>
                            <th></th>
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
                "stateSave": true,
                "type": "POST",
                "processing": true,
                "ajax": '{{ action('\jakubsacha\adminlte\Http\Controllers\PermissionsController@anyData') }}',
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "description" },
                    { "data": "created_at" },
                    { "data": "updated_at" },
                    { "width": "150px"}
                ],
                "columnDefs": [ {
                    "targets": 5,
                    "data": null,
                    "render": function(data) {
                        return '<div class="actions">' +
                        '<a href="' + data.edit_url + '" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a> ' +
                        '<a href="' + data.delete_url +'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>' +
                        '</div>';
                    }
                } ]
            } );
        } );
    </script>
@endsection