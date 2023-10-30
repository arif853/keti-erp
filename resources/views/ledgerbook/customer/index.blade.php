@extends('layouts.main')
@section('contents')
@include('ledgerbook.customer.edit')
@include('ledgerbook.customer.create')

<div class="row">
    <div class="col-lg-12">
        <h2 class="pull-left page-title">Customer Page</h2>
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb pull-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">New Customer</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-success " id="cus_modal">Create Customer</button>
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
                <h3 class="panel-title">Customer Summary</h3>
            </div>
            <div class="mini-stat-quote clearfix bx-shadow">
                <span class="mini-stat-icon-2">Total Customer</span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{$customers->count()}}</span>
                    Customers
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->


{{-- DataTable Start --}}
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Ledger Book Table</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <table id="datatable" class="table table-striped table-bordered cutomer_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Business Name</th>
                                    <th>Owner Name</th>
                                    <th> Manager Name</th>
                                    <th> Manager phone</th>
                                    <th> Last Transaction</th>
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
@push('customers')
<script>
    $(document).ready(function () {

        //show modal
        $(document).on('click', '#cus_modal', function () {

            $('#customer_form').trigger('reset');
            $("#cus_title").html('Add Customer');
            $("#cus-modal-form").modal('show');
        });


        //Customer editform modal
        $(document).on('click', '#edit_customer', function (e) {
            e.preventDefault();
            let id = $(this).val();
            // console.log(id)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/ledger/customer/edit',
                method: 'GET',
                data: {
                    id: id,
                },
                success: function (response) {
                    // console.log(response);
                    $("#id").val(response.id);

                    $("#reference").val(response.reference);
                    $("#credit_limit").val(response.credit_limit);
                    // $("#customer_id").val(response.id);
                    $("#business_name").val(response.business_name);
                    $("#owner_name").val(response.owner_name);
                    $("#phone").val(response.phone);
                    $("#phone2").val(response.phone2);
                    $("#email").val(response.email);
                    $("#address2").val(response.del_address);
                    $("#open_balance").val(response.open_balance);
                    $("#t_license").val(response.t_license);
                    $("#tin_number").val(response.tin);
                    $("#man_name").val(response.man_name);
                    $("#man_phone").val(response.man_phone);
                    $("#man_title").val(response.man_title);
                    $("#edit_modal_form").modal('show');
                }
            });
        });

        //DataTable Data view
        var table = $('#datatable').DataTable({
            ajax: {
                url: '/ledger/customer/show',
                dataSrc: 'data'

            },
            columns: [{
                    "data": "id"
                },
                {
                    "data": "business_name"
                },
                {
                    "data": "owner_name"
                },

                {
                    "data": "man_name"
                },
                {
                    "data": "man_phone"
                },
                {
                    "data": null,

                    render: function (data, type, row) {
                        var times = data.created_at.substring(0, 10);
                        return times
                    }
                },
                // {
                //     "data": "time"str.
                // },
                {
                    "data": null,

                    render: function (data, type, row) {
                        //  return '<button value="'+row.id+'" class="edit btn btn-primary" id="edit_customer" >edit</button>';
                        return '<button id="edit_customer" value="' + row.id +
                            '" class="btn btn-success  waves-effect waves-light "><i class="fa  fa-edit" aria-hidden="true"></i> </button>' +
                            '<button id="delete_customer" value="' + row.id +
                            '" class="btn btn-danger mx-10 waves-effect waves-light"><i class="fa  fa-trash" aria-hidden="true"></i> </button>' +
                            '<a  id="view_customer" href="{{('/ledger/customer/customerview/')}}'+ row.id +'" value="' + row.id +
                            '" class="btn btn-info  waves-effect waves-light"><i class="fa  fa-eye" aria-hidden="true"></i></a>';

                    }
                },
            ]
        });

        //Add New Customer
        $("#customer_form").submit(function (e) {
            e.preventDefault();
            const data = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/ledger/customer/store",
                method: 'post',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status == 200) {
                        $('#cus-modal-form').modal('hide');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        table.ajax.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                }
            })
        });

        //Update Customer
        $("#edit_customer_form").submit(function (e) {
            e.preventDefault();
            const data = new FormData(this);
            // console.log(data);
            $.ajax({
                url: '/ledger/customer/update',
                method: 'post',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.status == 200) {
                        $("#edit_modal_form").modal('hide');
                        table.ajax.reload();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: res.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                }
            })
        });

        //delete customer
        $(document).on('click', '#delete_customer', function (e) {
            e.preventDefault();
            var id = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/ledger/customer/destroy',
                        method: 'DELETE',
                        data: {
                            id: id,
                        },
                        success: function (response) {
                            Swal.fire(
                                'Deleted!',
                                'Customer Deleted Successfully.',
                                'success'
                            )
                            table.ajax.reload();
                        }
                    })
                }
            })

        });



    });

</script>
@endpush
