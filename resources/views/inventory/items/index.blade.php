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
                        <button class="btn btn-success" id="store">Store</button>
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

<div id="cus-modal-form" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="cus_title"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="product_form" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="status" class="control-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="NA">Select Status...</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="unit" class="control-label">Unit</label>
                            <input type="text" class="form-control" placeholder="PCS" id="unit" name="unit">
                        </div>
                        <div class="col-md-6"></div>
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
                            <label for="product_cost" class="control-label">Cost</label>

                            <input type="text" class="form-control" id="product_cost" placeholder="৳ Cost" name="product_cost" >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="mrp" class="control-label">M.R.P</label>
                            <input type="text" class="form-control" id="mrp" placeholder="৳ MRP" name="mrp" >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="vat" class="control-label">VAT %</label>
                            <input type="text" class="form-control" id="vat" placeholder="VAT %" name="vat" >
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
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
                                    <td>৳ 1500</td>
                                    <td>৳ 1600</td>
                                    <td>200</td>
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
            $(document).on('click', '#item_modal', function () {

                document.getElementById('product_form').reset();
                $("#cus_title").html('Add Item');
                $("#cus-modal-form").modal('show');

                document.getElementById("product_img").onchange = function(){
                    myFunction()
                };
                function myFunction() {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
                };
            });
        });

    </script>
@endpush
