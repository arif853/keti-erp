@extends('layouts.main')
@section('contents')

    <div class="row">
    <div class="col-sm-12">
    <h2 class="pull-left page-title">Sales Order</h2>
    <ol class="breadcrumb pull-right">
        <li><a href="#">Sales</a></li>
        <li class="active">Orders</li>
    </ol>
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
                        <div class="col-md-12 col-sm-12 col-xs-12" >
                            <a href="#" class="btn btn-success " data-toggle="modal" data-target="#custom-width-modal">New order</a>
                            <a href="#" class="btn btn-warning">Pending order</a>
                            <a href="#" class="btn btn-danger">Delete order</a>
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

    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:65%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="custom-width-modalLabel">New Order</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.dashboard')}}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <div class="input-group" >
                                    <label for="datepicker" class="control-label">Date*</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker" required>
                                    {{-- <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> --}}
                                </div><!-- input-group -->
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-2">
                                <label for="reference" class="control-label">Reference</label>
                                <input type="text" class="form-control" placeholder="Reference" id="reference">
                            </div>
                            <div class="col-md-2">
                                <label for="order-number" class="control-label">Order No.*</label>
                                <input type="text" class="form-control" placeholder="OR012-345" id="order-number" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="customar_id" class="control-label">ID</label>
                                    <input type="text" class="form-control" id="customar_id" placeholder="Id" name="customer-id">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="selectdata" class="control-label" >Customer Name*</label>
                                    <select class="select2" id="selectdata" data-placeholder="Choose a Country..." required>
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
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="product-id" class="control-label">ID</label>
                                <input type="text" class="form-control" id="product-id" placeholder="Id" name="product-id[0][name]" >
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
                            <div class="col-md-1">
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
                        <div id="goob"></div>
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
