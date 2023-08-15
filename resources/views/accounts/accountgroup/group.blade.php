@extends('layouts.main')
@section('contents')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="pull-left page-title">Accounts Group !</h2>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Accounts</a></li>
                <li class="active">Group</li>
            </ol>
        </div>
    </div>
    {{-- DataTable Start --}}
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Accounts Group Create</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" >
                            <a href="#" class="btn btn-success " id="account_modal">New Account Group</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Accounts Group Summary</h3>
                </div>
                <div class="mini-stat-quote clearfix bx-shadow">
                    <span class="mini-stat-icon-2">Total Groups</span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">20544</span>
                        Unique Visitors
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <div id="accounts_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:30%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Add Accounts Groups</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="account_group_form">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="group_name" class="control-label">Group Name</label>
                                    <input type="text" class="form-control" id="group_name" placeholder="Accounts Group Name" name="group_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="selectdata" class="control-label">Group Type</label>
                                    <select class="select2" id="selectdata" data-placeholder="Choose a type...">
                                        <option value="#">Select Type....</option>
                                        @foreach ($groups as $data)
                                        <option value="{{$data->id}}">{{$data->group_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light" id="submit">Submit</button>
                            <button type="button" class="btn btn-default btn-custom waves-effect" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{-- DataTable Start --}}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Accounts Group Table</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Group Name</th>
                                        <th>Group Type</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>
                                            <a href="#" class="btn btn-success waves-effect waves-light"><i class="fa  fa-edit" aria-hidden="true"></i> </a>
                                            <a href="#" class="btn btn-danger waves-effect waves-light"><i class="fa  fa-trash" aria-hidden="true"></i> </a>
                                            <a href="{{('/sales/salesquotes/invoice')}}" class="btn btn-info waves-effect waves-light"><i class="fa  fa-eye" aria-hidden="true"></i></a>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Row -->

    <script>
        $(document).ready(function(){

        $(document).on('click','#account_modal',function(){

            $('#account_group_form').trigger('reset');
            // $("#cus_title").html('Add Customer');
            $("#accounts_modal").modal('show');

        });

        });
    </script>
@endsection
@push('accountgroup')
    <script>
        $(document).ready(function(){

            $(document).on('click','#account_modal',function(){

                $('#account_group_form').trigger('reset');
                // $("#cus_title").html('Add Customer');
                $("#accounts_modal").modal('show');

            });
            var table =  $('#datatable').DataTable( {
                ajax: {
                    url: '/account/groups/show',
                    dataSrc: 'data'
                },
                columns: [
                    {"data":"id"},
                    {"data":"group_name"},
                    {"data":"group_type"},
                    {
                        "data": null,
                        render: function(data, type, row) {
                        //  return '<button value="'+row.id+'" class="edit btn btn-primary" id="edit_customer" >edit</button>';
                            return '<button id="edit_acc_group" value="'+row.id+'" class="btn btn-success  waves-effect waves-light "><i class="fa  fa-edit" aria-hidden="true"></i> </button>'+
                            '<button id="delete_group" value="'+row.id+'" class="btn btn-danger mx-10 waves-effect waves-light"><i class="fa  fa-trash" aria-hidden="true"></i> </button>';

                        }
                    },
                ]
            } );

        });

    </script>
@endpush
