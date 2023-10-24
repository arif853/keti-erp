@extends('layouts.main')
@section('contents')
@include('purchase.invoice.create')
@include('purchase.invoice.edit')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="pull-left page-title p-title"></h2>
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item active"><a href="#">Purchase</a></li>
                  {{-- <li class="breadcrumb-item active" aria-current="page">invoice</li> --}}
                </ol>
            </nav>
        </div>
    </div>
    {{-- Header Start --}}
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Purchase</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" >
                            <button  class="btn btn-info btn-custom" id="quote_btn">Quotes</button>
                            <button  class="btn btn-info btn-custom" id="order_btn">Order</button>
                            <button id="invoice_btn" class="btn btn-success btn-custom">Invoice</button>
                            <a href="#" class="btn btn-success btn-custom">Bill</a>
                            <a href="#" class="btn btn-info">Return</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Puchase Summary</h3>
                </div>
                <div class="mini-stat-quote clearfix bx-shadow">
                    <span class="mini-stat-icon-2">Total invoice</span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">20544</span>
                        Invoice
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
                    <h3 class="panel-title">Purchase Table</h3>
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
                                            <p class="m-t-10">
                                                <span class="badge badge-success">paid</span>
                                                <span class="badge badge-danger">Not delivered</span>
                                            </p>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-success waves-effect waves-dark"><i class="fa  fa-edit" aria-hidden="true"></i> </a>
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
@push('invoice')

    <script>
        $(document).ready(function(){
            $('.p-title').html('Purchase')

            // $(document).on('click','#invoice_btn', function(){
            //     $('#invoice_form').trigger('reset');
            //     $(".inv_title").html('INVOICE');
            //     $("#invoice_modal").modal('show');

            //     function invoice_no(invoiceN){
            //     var random_string = '';
            //     var numbers = '0123456789';

            //     for(var i , i = 0; i < invoiceN; i++ )
            //     {
            //         random_string += numbers.charAt(Math.floor(Math.random() * numbers.length))
            //     }
            //     return random_string;
            //     }
            //     var date = new Date();
            //     var year = date.getFullYear();
            //     document.getElementById('invoice_no').value = "INV" + year + "-" + invoice_no(3);

            // });

            // $('#datepicker').datepicker({
            //     autoclose: true,
            //     todayHighlight: true,
            //     todayBtn: "linked",
            //     format: "yyyy-mm-dd",
            //     startDate: '-3d',
            //     endDate: '1d',
            // });

            // var i = 0;
            // $('#add').click(function(){
            //     i++;
            //     $('#invoice_row').append(

            //         `<div class="row">
            //             <div class="col-md-0">
            //                 <input type="hidden" class="form-control" id="product_id" placeholder="Id" name="product_id[`+i+`][name]" value="0" readonly>
            //             </div>
            //             <div class="col-md-3">
            //                 <div class="form-group">
            //                     <select class=" form-control select2" id="selectdata" data-placeholder="Choose a Country...">
            //                         <option value="#">&nbsp;</option>
            //                         <option value="United States">United States</option>
            //                     </select>
            //                 </div>
            //             </div>
            //             <div class="col-md-3">
            //                     <input type="text" class="form-control" id="description" placeholder="Description" name="description">
            //                 </div>
            //             <div class="col-md-2">
            //                 <input type="number" class="form-control" id="quantity" placeholder="Qty" name="quantity" min="0" value="0">
            //             </div>
            //             <div class="col-md-1">
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
            // });

            // $(document).on('click','#remove-row', function(){
            //     $(this).parents('.row').remove();
            //     // console.log('Clicked on remove')
            // });

            // $(".t_st").change(function() {

            //     if($(this).val() == 2){
            //         $("#vehicle").css('display', 'block');
            //     }
            //     else{
            //         $("#vehicle").css('display', 'none');
            //     }
            //     if ($(this).val() == 1) {
            //         $("#vehicle2").css('display', 'block');
            //     } else {
            //         $("#vehicle2").css('display', 'none');
            //     }

            // });

            // $('#quote_btn').on('click', function(){
            //     location.href = "{{route('quote.index')}}"
            // });
            // $('#order_btn').on('click', function(){
            //     location.href = "{{route('order.index')}}"
            // });

        });
    </script>

@endpush
