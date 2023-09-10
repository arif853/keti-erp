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
                                    <a href="#" class="btn btn-warning">Pending order</a>
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
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Reference</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Manage</th>
                                        {{-- <th>Salary</th> --}}
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>2011/04/25</td>
                                        <td>
                                            <p class="m-t-10"> <span class="badge badge-success">active</span></p>
                                            {{-- <p class="m-t-10"> <span class="label label-success">Completed</span></p> --}}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-success waves-effect waves-light"><i class="fa  fa-edit" aria-hidden="true"></i> </a>
                                            <a href="#" class="btn btn-danger waves-effect waves-light"><i class="fa  fa-trash" aria-hidden="true"></i> </a>
                                            <a href="#" class="btn btn-info waves-effect waves-light"><i class="fa  fa-eye" aria-hidden="true"></i></a>

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
            // var date = new Date();

            // var day = date.getDate();
            // var month = date.getMonth() + 1;
            // var year = date.getFullYear();

            // if (month < 10) month = "0" + month;
            // if (day < 10) day = "0" + day;

            // var today = day + "-" + month + "-" + year;
            // document.getElementById("datepicker").value = today;


            var i = 0;
            // $('#add').click(function(){
            //     i++;

            //     $('#order_row').append(

            //         `<div class="row">
            //             <div class="order_id">
            //                 <input type="hidden" class="form-control" id="product_id" placeholder="Id" name="product_id[`+i+`][name]" value="0" readonly>
            //             </div>
            //             <div class="col-md-5">
            //                 <div class="form-group">
            //                     <select class="form-control" id="select_product"  required>
            //                         <option value="#">Select Product...</option>
            //                         <option value="United States">United States</option>
            //                         <option value="United States">Bangladesh</option>
            //                         <option value="United States">Africa</option>
            //                     </select>
            //                 </div>
            //             </div>

            //             <div class="col-md-2">
            //                 <input type="number" class="form-control" id="quantity" placeholder="Qty" name="quantity" min="0" value="0">
            //             </div>
            //             <div class="col-md-2">
            //                 <input type="number" class="form-control" id="discount" placeholder="Discount" name="discount" min="0" value="0">
            //             </div>
            //             <div class="col-md-2">
            //                 <input type="number" class="form-control" id="price" placeholder="Price" name="price" min="0" value="0">
            //             </div>
            //             <div class="col-md-1">
            //                 <button type="button" class="btn btn-danger" id="remove-row"><i class="fa fa-minus-square" aria-hidden="true"></i></button>
            //             </div>
            //         </div>`

            //     );
            //     //  console.log('Cliked');
            // });

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
            document.getElementById('order_no').value = "ORD" + year + "-" + order_no(3);
            });

            $('#select_product').editableSelect({
                // enable filter
                filter: true,

                // default, fade or slide
                effects: 'default',

                // fast, slow or [0-9]+
                duration: 'fast',
            });

        });
    </SCRipt>
@endpush
