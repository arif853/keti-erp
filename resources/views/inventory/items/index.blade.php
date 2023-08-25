@extends('layouts.main')
@section('contents')

<div class="row">
    <div class="col-lg-12">
        <h2 class="pull-left page-title">Item Page</h2>
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb pull-right">
              <li class="breadcrumb-item"><a href="#">Inventory</a></li>
              <li class="breadcrumb-item active" aria-current="page">Items</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Items</h3>
            </div>
            <div class="panel-body clearfix">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-success" id="item_modal">Add Item</button>
                        <button class="btn btn-success" id="item_issue">Issue Item</button>
                        <a class="btn btn-success" id="store" >Store</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Items Summary</h3>
            </div>
            <div class="mini-stat-quote  ">
                <span class="mini-stat-icon-2">Total Customer</span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter"></span>
                    Customers
                </div>
            </div>
        </div>
    </div>
</div>
{{-- product add modal --}}
<div id="product_modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="cus_title"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="product_form" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <label for="status" class="control-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="NA">Select Status...</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label for="unit" class="control-label">Unit</label>
                            <input type="text" class="form-control" placeholder="PCS" id="unit" name="unit">
                        </div>
                        <div class="col-lg-5"></div>
                        <div class="col-lg-3">
                            <label for="barcode" class="control-label">Barcode</label>
                            <input type="text" class="form-control" placeholder="Barcode" id="barcode" name="barcode">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-1">
                                <div class="form-group">
                                    <label for="customar_id" class="control-label">ID</label>
                                    <input type="text" class="form-control" id="customer_id" placeholder="Id" readonly>
                                </div>
                            </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="product_name" class="control-label">Product Name*</label>
                                <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="product_img" class="control-label">Product Image</label>
                                <input type="file" class="form-control" id="product_img" placeholder="Image" name="product_img" >
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="img-output">
                                <img id="output"  width="100" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="brand" class="control-label">Brand</label>
                            <select name="brand" id="brand" class="form-control">
                                <option value="NA">Select Brand...</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="catagory" class="control-label">Catagory</label>
                            <select name="catagory" id="catagory" class="form-control">
                                <option value="NA">Select Catagory...</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="group" class="control-label">Group</label>
                            <select name="group" id="group" class="form-control">
                                <option value="NA">Select Group...</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="model" class="control-label">Model</label>
                            <select name="model" id="model" class="form-control">
                                <option value="NA">Select Model...</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="product_cost" class="control-label">Product Cost</label>
                            <input type="text" class="form-control" id="product_cost" placeholder="৳ Cost" name="product_cost" >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="vat" class="control-label">VAT %</label>
                            <input type="text" class="form-control" id="vat" placeholder="VAT %" name="vat" >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="o_charge" class="control-label">Other Charge</label>
                            <input type="text" class="form-control" id="o_charge" placeholder="Other Charge" name="o_charge" >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="mrp" class="control-label">M.R.P(Click me)</label>
                            <input type="text" class="form-control" id="mrp" placeholder="৳ MRP" name="mrp" readonly>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" id="submit" class="btn btn-primary btn-custom waves-effect waves-light submit">Add Item</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- product issue modal --}}
<div id="product_issue_modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="cus_title"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="product_issue_form" method="POST">
                <div class="modal-body" >

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="" >
                                <label for="datepicker" class="control-label">Date</label>
                                <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="datepicker">
                                {{-- <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> --}}
                            </div><!-- input-group -->
                        </div>
                        <div class="col-lg-3">
                            <label for="store" class="control-label">Store</label>
                            <input type="text" class="form-control" placeholder="Store Location" id="store">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="products" class="control-label">Products</label>
                        </div>
                        <div class="col-lg-4">
                            <label for="quantity" class="control-label">Quantity</label>
                        </div>
                        <div class="col-lg-2">
                            <label for="add_row" class="control-label">Add row</label>
                        </div>
                    </div>
                    <div class="" data-x-wrapper="products">
                        <div class="inventory_group m-b-10" data-x-group>
                            <div class="row">
                                <div class="col-lg-6">
                                    <select class="form-control" name="products" id="products" required>
                                        <option value="NA">Select Product...</option>
                                        <option value="1">Product-1</option>
                                        <option value="0">Product-2</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <input type="number" value="" min="0" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-primary" data-add-btn>+</button>
                                    <button type="button" class="btn btn-danger" data-remove-btn>-</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="submit" class="btn btn-primary btn-custom waves-effect waves-light submit">Add Item</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- DataTable Start --}}
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Items Table</h3>

            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <table id="datatable" class="table table-striped table-bordered mytable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Items Name</th>
                                    <th>Barcode</th>
                                    <th>Cost</th>
                                    <th>MRP</th>
                                    <th>Available</th>
                                    <th>Unit</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Active</td>
                                    <td>Bata Lether Shoe</td>
                                    <td>{!! DNS1D::getBarcodeSVG('94345256811', 'EAN13','2','40') !!}
                                        </td>
                                    <td>৳ 1500</td>
                                    <td>৳ 1600</td>
                                    <td>0</td>
                                    <td>Pcs</td>
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
@push("items")
    <script>
        $(document).ready(function(){

            //add item button
            $(document).on('click', '#item_modal', function () {

                document.getElementById('product_form').reset();
                $("#cus_title").html('Add Item');
                $("#product_modal").modal('show');

                document.getElementById("product_img").onchange = function(){
                    myFunction()
                };
                function myFunction() {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
                };
            });

            //issue product modal button
            $(document).on('click', '#item_issue', function () {

                document.getElementById('product_issue_form').reset();
                $("#cus_title").html('Add Item');
                $("#product_issue_modal").modal('show');

            });

            //costcalulation
            $('#mrp').on('click',function(){

                let mrps = 0;
                mrps = costcount();
                this.value = mrps;
            });

             function costcount() {
                var cost = $("#product_cost").val();
                var vat = $("#vat").val();
                var o_charge = $("#o_charge").val();

                let num1 = 0;
                let num2 = 0;
                let num3 = 0;

                num1 = Number(cost);
                num2 = Number(vat);
                num3 = Number(o_charge);

                var mrp = 0;
                var withvat = 0;

                if(num1 && num2 && num3 || num1 && !num2 && num3 || num1 && num2 && !num3 || num1 && !num2 && !num3) {

                    withvat = num1 * (num2/100);
                    mrp = num1 + num3 + withvat ;

                    return mrp;
                }else{
                    return 0;
                }

            };
            //issue item new row add
            const selector = '[data-x-wrapper]';
            let options = {
                disableNaming: '[data-disable-naming]',
                wrapper: selector,
                group: '[data-x-group]',
                addBtn: '[data-add-btn]',
                removeBtn: '[data-remove-btn]'
            };
            $(selector).replicate(options);

            // datepicker
            $('#datepicker').datepicker({
                autoclose: true,
                todayHighlight: true,
                todayBtn: "linked",
                format: "yyyy-mm-dd",
                startDate: '-3d',
                endDate: '1d',
            });

            $('#store').on('click', function(){
                location.href = "{{route('store.index')}}"
            });
        });

    </script>
@endpush
