@extends('layouts.main')
@section('contents')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="pull-left page-title"></h2>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Ledger</a></li>
                <li class="active">Supplier</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title h-title"></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" >
                            <button  class="btn btn-success " id="Supplier_btn">Create Supplier</button>
                            <a href="#" class="btn btn-warning">View Ledger</a>
                            {{-- <a href="#" class="btn btn-danger"></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title p-title"></h3>
                </div>
                <div class="mini-stat-quote clearfix bx-shadow">
                    <span class="mini-stat-icon-2">Total Supplier</span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter"></span>
                        Suppliers
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    {{-- Edit Supplier Modal Start --}}
    <div id="edit_supplier" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" style="width:50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="edit_title">Edit Customer</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <form  id="edit_customer_form"  >
                    @csrf
                <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="reference" class="control-label">Reference</label>
                                <input type="text" class="form-control" placeholder="Reference" id="reference" name="ref">
                            </div>
                            <div class="col-md-2">
                                <label for="credit_limit" class="control-label">Credit Limit</label>
                                <input type="number" min="0" value="0" class="form-control  alert-success" id="credit_limit" name="credit_lim">
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <br>
                        <div class="row">
                            {{-- <div class="col-md-1">
                                <div class="form-group">
                                    <label for="customar_id" class="control-label">ID</label>
                                    <input type="text" class="form-control" id="customer_id" placeholder="Id" readonly>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_name" class="control-label">Business Name*</label>
                                    <input type="text" class="form-control" id="business_name" placeholder="Business Name" name="business_name" required>
                                    <div id="saveform_errlist" class="business_name"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="owner_name" class="control-label">Owner Name*</label>
                                    <input type="text" class="form-control" id="owner_name" placeholder="Owner Name" name="owner_name" required>
                                    <div id="saveform_errlist" class="owner_name"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="phone" class="control-label">Primary Phone*</label>
                                <input type="text" class="form-control" placeholder="+880 " id="phone" name="phone"  required>
                                <div id="saveform_errlist" class="phone"></div>
                            </div>
                            <div class="col-md-3">
                                <label for="phone2" class="control-label">Secondary  Phone</label>
                                <input type="text" class="form-control" placeholder="+880 " id="phone2" name="phone2">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" class="form-control" placeholder="example@email.com" id="email" name="email">
                            </div>
                        </div>
                        <p style="margin-top: 15px"></p>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="address2" class="control-label">Delivary Address*</label>
                                <textarea type="text" class="form-control" placeholder="Address.... " id="address2" name="address2" required></textarea>
                                <div id="saveform_errlist" class="address2"></div>
                            </div>
                        </div>
                        <p style="margin-top: 15px"></p>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="acc_group" class="control-label">Account Group</label>
                                    <select class="select2" id="acc_group" name="acc_group">
                                        <option value="#">Select Account Group...</option>
                                        @foreach ($groups as $data)
                                        <option value="{{$data->id}}">{{$data->group_name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="open_balance" class="control-label">Opening Balance</label>
                                    <input type="number" min="0" class="form-control alert-success" placeholder="Opening Balance " id="open_balance"  name="open_balance">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="t_license" class="control-label">Trade License</label>
                                    <input type="text" class="form-control " placeholder="Trade License " id="t_license" name="t_license">
                                </div>
                                <div class="col-md-2">
                                    <label for="tin_number" class="control-label">TIN Number</label>
                                    <input type="text" class="form-control " placeholder="Tin Number " id="tin_number" name="tin_number">
                                </div>
                                <div class="col-md-6"></div>
                            </div>

                            <hr>
                            <p class="control-label text-info">Contact person/Manager</p>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="man_name" class="control-label">Name</label>
                                    <input type="text" class="form-control " placeholder="Name " id="man_name" name="man_name">
                                    <div id="saveform_errlist" class="man_name"></div>
                                </div>
                                <div class="col-md-3">
                                    <label for="man_phone" class="control-label">Phone Number</label>
                                    <input type="text" class="form-control " placeholder="Phone Number " id="man_phone" name="man_phone">
                                <div id="saveform_errlist" class="man_phone"></div>
                            </div>
                            <div class="col-md-3">
                                <label for="man_title" class="control-label">Title</label>
                                <input type="text" class="form-control " placeholder="Title" id="man_title" name="man_title">
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 text-right">
                                <button type="submit" id="update" class="btn btn-primary btn-custom waves-effect waves-light update" >Update Customer</button>
                                {{-- <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light"><i class="fa fa-print" aria-hidden="true"></i>                                </button>
                                <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light">Submit & print</button> --}}
                                <button type="button" class="btn btn-default " data-dismiss="modal" id="close">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{-- Edit Supplier Modal End --}}

    {{-- Add Supplier Modal Start --}}
    <div id="Supplier_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" style="width:50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title " id="cus_title"></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="modal-body">
                    <form  id="supplier_form" method="POST" >

                        <div class="row">
                            <input type="hidden" class="form-control" id="id"  >
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="supplier_name" class="control-label">Supplier Name*</label>
                                    <input type="text" class="form-control" id="supplier_name" placeholder="Supplier Name" name="supplier_name" required>
                                    <div id="saveform_errlist" class="business_name"></div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="owner_name" class="control-label">Owner Name*</label>
                                    <input type="text" class="form-control" id="owner_name" placeholder="Owner Name" name="owner_name" required>
                                    <div id="saveform_errlist" class="owner_name"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="phone" class="control-label">Primary Phone*</label>
                                <input type="text" class="form-control" placeholder="+880 " id="phone" name="phone"  required>
                                <div id="saveform_errlist" class="phone"></div>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" class="form-control" placeholder="example@email.com" id="email" name="email">
                            </div>
                        </div>
                        <p style="margin-top: 10px"></p>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="address2" class="control-label">Delivary Address*</label>
                                <textarea type="text" class="form-control" placeholder="Address.... " id="address2" name="address2" required></textarea>
                                <div id="saveform_errlist" class="address2"></div>
                            </div>
                        </div>
                        <p style="margin-top: 10px"></p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="selectdata" class="control-label">Account Group</label>
                                    <select class="select2" id="selectdata" name="acc_group">
                                        <option value="#">Select Group....</option>
                                        @foreach ($groups as $data)
                                        <option value="{{$data->id}}">{{$data->group_name}}</option>
                                        @endforeach

                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" id="submit" class="btn btn-primary btn-custom waves-effect waves-light submit" >Add</button>
                                {{-- <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light"><i class="fa fa-print" aria-hidden="true"></i>                                </button>
                                <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light">Submit & print</button> --}}
                                <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{-- Add Customer Modal End --}}

    {{-- DataTable Start --}}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ledger Book Table</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered mytable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Supplier Name</th>
                                        <th>Owner Name</th>
                                        {{-- <th>Debite</th>
                                            <th>Credit</th> --}}
                                        <th>phone</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Row -->


@endsection
@push('supplier')
    <script>
        $(document).ready(function(){

            $(".page-title").html('Supplier Page');
            $(".h-title").html('New Supplier');
            $(".p-title").html('Supplier Summary');

            //show modal
            $(document).on('click','#Supplier_btn', function(){

                $('#supplier_form').trigger('reset');
                $("#cus_title").html('ADD SUPPLIER');
                $("#Supplier_modal").modal('show');

            });

            //Customer editform modal
            // $(document).on('click','#edit_customer',function(e){
            //     e.preventDefault();
            //     let id = $(this).val();
            //     // console.log(id)
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             }
            //         });
            //     $.ajax({
            //         url : '/ledger/customer/edit',
            //         method : 'GET',
            //         data : {
            //             id: id,
            //         },
            //         success: function(response){
            //             // console.log(response);
            //             $("#id").val(response.id);

            //             $("#reference").val(response.reference);
            //             $("#credit_limit").val(response.credit_limit);
            //             // $("#customer_id").val(response.id);
            //             $("#business_name").val(response.business_name);
            //             $("#owner_name").val(response.owner_name);
            //             $("#phone").val(response.phone);
            //             $("#phone2").val(response.phone2);
            //             $("#email").val(response.email);
            //             $("#address2").val(response.del_address);
            //             $("#open_balance").val(response.open_balance);
            //             $("#t_license").val(response.t_license);
            //             $("#tin_number").val(response.tin);
            //             $("#man_name").val(response.man_name);
            //             $("#man_phone").val(response.man_phone);
            //             $("#man_title").val(response.man_title);
            //             $("#edit_modal_form").modal('show');
            //         }
            //     });
            // });

            //DataTable Data view
            // var table =  $('.mytable').DataTable( {
            //     ajax: {
            //         url: '/ledger/supplier/show',
            //         dataSrc: 'data'
            //     },
            //     columns: [
            //         {"data":"id"},
            //         {"data":"supplier_name"},
            //         {"data":"owner_name"},
            //         {"data":"phone"},
            //         {"data":"created_at"},
            //         {
            //             "data": null,
            //             render: function(data, type, row) {
            //             //  return '<button value="'+row.id+'" class="edit btn btn-primary" id="edit_customer" >edit</button>';
            //                 return '<button id="edit_supplier" value="'+row.id+'" class="btn btn-success  waves-effect waves-light "><i class="fa  fa-edit" aria-hidden="true"></i> </button>'+
            //                 '<button id="delete_supplier" value="'+row.id+'" class="btn btn-danger mx-10 waves-effect waves-light"><i class="fa  fa-trash" aria-hidden="true"></i> </button>'+
            //                 '<button  id="view_supplier" value="'+row.id+'" class="btn btn-info  waves-effect waves-light"><i class="fa  fa-eye" aria-hidden="true"></i></button>';

            //             }
            //         },
            //     ]
            // } );

            //Add New Customer
            // $("#customer_form").submit(function(e){
            //     e.preventDefault();
            //     const data = new FormData(this);
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             }
            //         });
            //     $.ajax({
            //         url:"/ledger/customer/store/",
            //         method: 'post',
            //         data : data,
            //         cache : false,
            //         processData: false,
            //         contentType: false,
            //         success:function(response){
            //             if(response.status == 200){
            //                 $('#cus-modal-form').modal('hide');
            //                 Swal.fire({
            //                     position: 'top-end',
            //                     icon: 'success',
            //                     title: response.message,
            //                     showConfirmButton: false,
            //                     timer: 2000
            //                 })
            //                 table.ajax.reload();
            //             }
            //             else{
            //                 Swal.fire({
            //                     icon: 'error',
            //                     title: 'Oops...',
            //                     text: 'Something went wrong!',
            //                 })
            //             }
            //         }
            //     })
            // });

            //Update Customer
            // $("#edit_customer_form").submit(function(e){
            //     e.preventDefault();
            //     const data = new FormData(this);
            //     // console.log(data);
            //     $.ajax({
            //         url : '/ledger/customer/update',
            //         method : 'post',
            //         data : data,
            //         cache : false,
            //         processData : false,
            //         contentType : false,
            //         success: function(res){
            //             if(res.status == 200){
            //                 $("#edit_modal_form").modal('hide');
            //                 table.ajax.reload();
            //                 Swal.fire({
            //                     position: 'top-end',
            //                     icon: 'success',
            //                     title: res.message,
            //                     showConfirmButton: false,
            //                     timer: 2000
            //                 })
            //             }
            //         }
            //     })
            // });

            //delete customer
            // $(document).on('click','#delete_customer',function(e){
            //     e.preventDefault();
            //     var id = $(this).val();

            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             }
            //         });

            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //         $.ajax({
            //             url : '/ledger/customer/destroy',
            //             method : 'DELETE',
            //             data : {
            //                 id : id,
            //             },
            //             success:function(response){
            //                 Swal.fire(
            //                     'Deleted!',
            //                     'Customer Deleted Successfully.',
            //                     'success'
            //                 )
            //                 table.ajax.reload();
            //             }
            //         })
            //         }
            //     })

            // });

        });
    </script>
@endpush
