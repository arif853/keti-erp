@extends('layouts.main')
@section('contents')
@include('sales.order.create')
@include('sales.order.edit')

    <div class="row">
        <div class="col-sm-12">
            <h2 class="pull-left page-title">Sales Order</h2>
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="#">Sales</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Order</li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- Header Start --}}
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sales Order Create</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12" >
                            <div class="d-flex justify-content-between">
                                <div class="left">
                                    <button id="order_btn" class="btn btn-success " >New order</button>
                                    {{-- <a href="#" class="btn btn-warning">Pending order</a> --}}
                                    {{-- <a href="#" class="btn btn-danger">Delete order</a> --}}
                                </div>
                                <div class="right">
                                    <a href="{{route('sales.index')}}" class="btn btn-danger ">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sales Orders Summary</h3>
                </div>
                <div class="mini-stat-quote clearfix bx-shadow">
                    <span class="mini-stat-icon-2">Total orders</span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">20544</span>
                        Unique Visitors
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    {{-- DataTable Start --}}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sales Quotes Table</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order No</th>
                                        <th>Order Date</th>
                                        <th>Customer Name</th>
                                        <th>Status</th>
                                        <th>Manage</th>
                                        {{-- <th>Salary</th> --}}
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
@push('order')
    <SCRipt>
        $(document).ready(function(){

            $('#datepicker').datepicker({
                autoclose: true,
                todayHighlight: true,
                todayBtn: "linked",
                format: "yyyy-mm-dd",
                startDate: '-3d',
                endDate: '1d',
            });

            $(document).on('click','#remove-row', function(){
                $(this).parents('.row').remove();
                // console.log('Clicked on remove')
            });


            $(document).on('click','#order_btn', function(){
            $('#order_form').trigger('reset');
            $(".inv_title").html('INVOICE');
            $("#order_modal").modal('show');

            function order_no(orderN){
                var random_string = '';
                var numbers = '0123456789';

                for(var i , i = 0; i < orderN; i++ )
                {
                    random_string += numbers.charAt(Math.floor(Math.random() * numbers.length))
                }
                return random_string;
            }
            var date = new Date();
            var year = date.getFullYear();
            document.getElementById('order_no').value = "ORD" + year + "-" + order_no(4);
            });
            //New row generator
            const selector = '[data-x-wrapper]';
                let options = {
                    disableNaming: '[data-disable-naming]',
                    wrapper: selector,
                    group: '[data-x-group]',
                    addBtn: '[data-add-btn]',
                    removeBtn: '[data-remove-btn]'
                };
            $(selector).replicate(options);


            //DataTable Data view
            var table = $('#datatable').DataTable({
                ajax: {
                    url: '/sales/order/datatable',
                    dataSrc: 'data'
                },
                columns: [
                    {
                        "data": "order_no"
                    },
                    {
                        "data": "order_date"
                    },
                    {
                        "data": "customer"
                    },
                    {
                        "data": null,

                        render: function (data, type, row) {

                            if(row.order_no == 'ORD2023-3797')
                            {
                                return '<div class="form-check">'+
                                        '<p class="badge badge-warning">'+
                                            '<input class="form-check-input position-static " type="checkbox" id="blankCheckbox" value="0" aria-label="...">'+
                                            '<span> Pending</span>'+
                                        '</p>'+
                                        '</div>';
                            }
                            else{
                                return  '<div class="form-check">'+
                                        '<p class="badge badge-success">'+
                                            '<input class="form-check-input position-static " type="checkbox" id="blankCheckbox" value="1" checked aria-label="...">'+
                                            '<span> Completed</span>'+
                                        '</p>'+
                                        '</div>';
                            }
                    }
                    },
                    {
                        "data": null,

                        render: function (data, type, row) {
                            //  return '<button value="'+row.id+'" class="edit btn btn-primary" id="edit_customer" >edit</button>';
                            return '<button id="edit_quote" value="' + row.order_no +
                                '" class="btn btn-success  waves-effect waves-light "><i class="fa  fa-edit" aria-hidden="true"></i> </button>' +
                                '<button id="delete_quote" value="' + row.order_no +
                                '" class="btn btn-danger mx-10 waves-effect waves-light"><i class="fa  fa-trash" aria-hidden="true"></i> </button>' +
                                '<a  id="view_quote" href="{{('/sales/order/show/')}}'+ row.order_no +'" target="_blank" class="btn btn-info  waves-effect waves-light"><i class="fa  fa-eye" aria-hidden="true"></i></a>'+
                                '<a id="print_quote" value="' + row.order_no +
                                '" class="btn btn-danger mx-10 waves-effect waves-light"><i class="fa fa-print" aria-hidden="true"></i> </a>';
                                //href="{{('/sales/quote/show/')}}'+ row.quotation_no +'"
                        }
                    },
                ]
            });

            //Add New Quote
            $("#order_form").submit(function(e){

                e.preventDefault();
                const data = new FormData(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/sales/order/store',
                    method: 'post',
                    data : data,
                    cache : false,
                    processData: false,
                    contentType: false,
                    success:function(response){
                        if(response.status == 200){
                            $('#order_modal').modal('hide');
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 2000
                            })
                            table.ajax.reload();
                        }
                    },error(response){
                        if(response.status == 400){
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    }
                })
            });

        });
    </SCRipt>
@endpush
