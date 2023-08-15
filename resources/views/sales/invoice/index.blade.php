@extends('layouts.main')
@section('contents')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="pull-left page-title p-title"></h2>
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item active"><a href="#">Sales</a></li>
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
                    <h3 class="panel-title">Sales</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" >
                            <a href="{{route('sales.salesquotes')}}" class="btn btn-info btn-custom">Quotes</a>
                            <a href="{{route('sales.salesorder')}}" class="btn btn-info btn-custom">Order</a>
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

    <div id="invoice_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl" >
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title inv_title" id="custom-width-modalLabel"></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="invoice_form" >
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <label for="datepicker" class="control-label">Date*</label>
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" id="datepicker">
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-2">
                                <label for="reference" class="control-label">Reference</label>
                                <input type="text" class="form-control" placeholder="Reference" id="reference">
                            </div>
                            <div class="col-md-2">
                                <label for="invoice_no" class="control-label">Invoice No.*</label>
                                <input type="text" class="form-control" placeholder="INV012-345" id="invoice_no" required @readonly(true)>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-0">
                                <div class="form-group">
                                    {{-- <label for="customar_id" class="control-label">ID</label> --}}
                                    <input type="hidden" class="form-control" id="customar_id" placeholder="Id" name="customer-id">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="selectdata" class="control-label" >Customer Name*</label>
                                    <select class="select2" id="selectdata"  required>
                                        <option value="#">Select Customer....</option>
                                        {{-- <option value="#">Select Customer...</option>
                                        @foreach ($customer as $data)
                                        <option value="{{$data->id}}">{{$data->business_name}}</option>

                                        @endforeach --}}
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2 " >
                                <div id="vehicle" style="display: none">
                                    <label for="vehicle_no" class="control-label">Number:</label>
                                    <input type="text" class="form-control" id="vehicle_no"  name="vehicle_no" >
                                </div>
                                <div  id="vehicle2" style="display: none">
                                    <label for="ts_name" class="control-label">Name:</label>
                                    <input type="text" class="form-control" id="ts_name"  name="ts_name" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="delivary_mode" class="control-label">Delivary Mode:</label>
                                <select class="select2 t_st" id="selectdata" name="delivary_mode" required>
                                    <option value="#">Select Mode...</option>
                                    <option value="1">Courier Service</option>
                                    <option value="2">Transport</option>
                                    <option value="3">Local Transport</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-0">
                                {{-- <label for="product-id" class="control-label">ID</label> --}}
                                <input type="hidden" class="form-control" id="product-id" placeholder="Id" name="product-id[0][name]" >
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="selectdata" class="control-label">Item*</label>
                                    <select class="form-control " id="selectdata" data-placeholder="Item Names" required>
                                        <option value="#">&nbsp;</option>
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Aland Islands">Aland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <label for="description" class="control-label">Description</label>
                                <input type="text" class="form-control" id="description" placeholder="Description" name="description">
                            </div>
                            <div class="col-md-2">
                                <label for="quantity" class="control-label">Qty*</label>
                                <input type="number" class="form-control" id="quantity" placeholder="Qty" name="quantity" min="0" value="0" required>
                            </div>
                            <div class="col-md-1">
                                <label for="discount" class="control-label">Discount(%)</label>
                                <input type="number" class="form-control" id="discount" placeholder="Discount" name="discount" min="0" value="0" >
                            </div>
                            <div class="col-md-2">
                                <label for="price" class="control-label">Price</label>
                                <input type="number" class="form-control" id="price" placeholder="Price" name="price" min="0" value="0">
                            </div>

                            <div class="col-md-1">
                                <label for="btn" class="control-label">Add Row</label>
                                <button type="button" class="btn btn-success btn-custom" id="add"><i class="fa fa-plus-square" aria-hidden="true"></i>
                                </button>
                                {{-- <button type="button" class="btn btn-danger" id="remove-row">remove </button> --}}
                            </div>

                        </div>
                        <div id="invoice_row"></div>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="text-right " style="padding-top: 7px;">Subtotal :</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" value="" placeholder="Subtotal" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="text-right " style="padding-top: 10px;">Total Discount :</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" value="" placeholder="Discount" class="form-control sub-mt">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="text-right " style="padding-top: 10px;">VAT :</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" value="" placeholder="Vat" class="form-control sub-mt">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="text-right " style="padding-top: 10px;">Total :</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" value="" placeholder="Total" class="form-control sub-mt">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light">Submit</button>
                                <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light"><i class="fa fa-print" aria-hidden="true"></i>                                </button>
                                <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light">Submit & print</button>
                                <button type="button" class="btn btn-default btn-custom waves-effect" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

                </div> --}}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
                                            <p class="m-t-10"> <span class="label label-danger">Pending</span></p>
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
@push('invoice')

    <script>
        $(document).ready(function(){
            $('.p-title').html('Sales Invoice')

            $(document).on('click','#invoice_btn', function(){
                $('#invoice_form').trigger('reset');
                $(".inv_title").html('INVOICE');
                $("#invoice_modal").modal('show');

                function invoice_no(invoiceN){
                var random_string = '';
                var numbers = '0123456789';

                for(var i , i = 0; i < invoiceN; i++ )
                {
                    random_string += numbers.charAt(Math.floor(Math.random() * numbers.length))
                }
                return random_string;
                }
                var date = new Date();
                var year = date.getFullYear();
                document.getElementById('invoice_no').value = "INV" + year + "-" + invoice_no(3);

            });

            jQuery('#datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    startDate: '-3d',
                    endDate: '1d',
                    defaultViewDate: today
                });

            var date = new Date();

            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();

            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;

            var today = day + "-" + month + "-" + year;
            document.getElementById("datepicker").value = today;

            var i = 0;
            $('#add').click(function(){
                i++;
                $('#invoice_row').append(

                    `<div class="row">
                        <div class="col-md-0">
                            <input type="hidden" class="form-control" id="product_id" placeholder="Id" name="product_id[`+i+`][name]" value="0" readonly>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class=" form-control select2" id="selectdata" data-placeholder="Choose a Country...">
                                    <option value="#">&nbsp;</option>
                                    <option value="United States">United States</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                                <input type="text" class="form-control" id="description" placeholder="Description" name="description">
                            </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" id="quantity" placeholder="Qty" name="quantity" min="0" value="0">
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" id="discount" placeholder="Discount" name="discount" min="0" value="0">
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" id="price" placeholder="Price" name="price" min="0" value="0">
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger" id="remove-row"><i class="fa fa-minus-square" aria-hidden="true"></i></button>
                        </div>
                    </div>`

                );
            });

            $(document).on('click','#remove-row', function(){
                $(this).parents('.row').remove();
                // console.log('Clicked on remove')
            });

            $(".t_st").change(function() {

            if($(this).val() == 2){
                $("#vehicle").css('display', 'block');
            }
            else{
                $("#vehicle").css('display', 'none');
            }
            if ($(this).val() == 1) {
                $("#vehicle2").css('display', 'block');
            } else {
                $("#vehicle2").css('display', 'none');
            }

            });

        });
    </script>

@endpush
