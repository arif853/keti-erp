@extends('layouts.main')
@section('contents')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="pull-left page-title">Customer Page</h2>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Ledger</a></li>
                <li class="active">Customer</li>
            </ol>
        </div>
    </div>
    {{-- DataTable Start --}}
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">New Customer</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" >
                            <button  class="btn btn-success " id="cus_modal">Create Customer</button>
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
                        <span class="counter">20544</span>
                        Unique Visitors
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
<div id="saveform_errlist"></div>
<div id="success_message"></div>
    <div id="cus-modal-form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:65%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title text-center" id="cus_title"></h3>
                </div>
                <div class="modal-body">
                    <form  id="customer_form">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="reference" class="control-label">Reference</label>
                                <input type="text" class="form-control" placeholder="Reference" id="reference" >
                            </div>
                            <div class="col-md-2">
                                <label for="credit-limit" class="control-label">Credit Limit</label>
                                <input type="number" min="0" value="0" class=" form-control  alert-success " id="credit_limit" >
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="customar_id" class="control-label">ID</label>
                                    <input type="text" class="form-control" id="customer_id" placeholder="Id" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_name" class="control-label">Business Name</label>
                                    <input type="text" class="form-control" id="business_name" placeholder="Business Name" >
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="owner_name" class="control-label">Owner Name</label>
                                    <input type="text" class="form-control" id="owner_name" placeholder="Owner Name" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="phone" class="control-label">Primary Phone*</label>
                                <input type="text" class="form-control" placeholder="+880 " id="phone"   required>
                            </div>
                            <div class="col-md-3">
                                <label for="phone2" class="control-label">Secondary  Phone</label>
                                <input type="text" class="form-control" placeholder="+880 " id="phone2" >
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" class="form-control" placeholder="example@email.com" id="email" >
                            </div>
                        </div>
                        <p style="margin-top: 15px"></p>
                        <div class="row">
                            <div class="col-md-6">

                                <label for="address" class="control-label">Billing Address*</label>
                                <textarea type="text" class="form-control " placeholder="Address.... " id="address" ></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="address2" class="control-label">Delivary Address*</label>
                                <textarea type="text" class="form-control" placeholder="Address.... " id="address2" ></textarea>
                            </div>
                        </div>
                        <p style="margin-top: 15px"></p>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="acc_group" class="control-label">Account Group</label>
                                    <select class="select2" id="acc_group" data-placeholder="Account Group..." >
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
                                <label for="opening_balance" class="control-label">Opening Balance</label>
                                <input type="number" min="0" class="form-control alert-success" placeholder="Opening Balance " id="opening_balance"  >
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="t_license" class="control-label">Trade License</label>
                                <input type="text" class="form-control " placeholder="Trade License " id="t_license">
                            </div>
                            <div class="col-md-2">
                                <label for="tin-number" class="control-label">TIN Number</label>
                                <input type="text" class="form-control " placeholder="Tin Number " id="tin_number" >
                            </div>
                            <div class="col-md-6"></div>
                        </div>

                        <hr>
                        <p class="control-label text-info">Contact person/Manager</p>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="man-name" class="control-label">Name</label>
                                <input type="text" class="form-control " placeholder="Name " id="man_name" >
                            </div>
                            <div class="col-md-3">
                                <label for="man-phone-number" class="control-label">Phone Number</label>
                                <input type="text" class="form-control " placeholder="Phone Number " id="man_phone" >
                            </div>
                            <div class="col-md-3">
                                <label for="man-title" class="control-label">Title</label>
                                <input type="text" class="form-control " placeholder="Title" id="man_title" >
                            </div>
                            <div class="col-md-3"></div>
                        </div>



                        <hr>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 text-right">
                                <button type="submit" id="submit" class="btn btn-primary btn-custom waves-effect waves-light submit" >Submit</button>
                                {{-- <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light"><i class="fa fa-print" aria-hidden="true"></i>                                </button>
                                <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light">Submit & print</button> --}}
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
                    <h3 class="panel-title">Ledger Book Table</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered mytable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>owner Name</th>
                                        {{-- <th>Debite</th>
                                        <th>Credit</th> --}}
                                        <th> Manager Name</th>
                                        <th> Manager phone</th>
                                        <th> Opening Date</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>


                                {{-- <tbody id="customer_list">

                                    @foreach ($customers as $data)
                                        <tr id="cus_data_{{$data->id}}">
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->business_name}}</td>
                                            <td>20000</td>
                                            <td>40000</td>
                                            <td>{{$data->created_at}}</td>
                                            <td>
                                                <button type="submit" id="edit_customer" data-id="{{$data->id}}" class="btn btn-success waves-effect waves-light"><i class="fa  fa-edit" aria-hidden="true"></i> </button>
                                                <button type="submit" id="delete_customer" data-id="{{$data->id}}" class="btn btn-danger waves-effect waves-light"><i class="fa  fa-trash" aria-hidden="true"></i> </button>
                                                <button type="submit" id="view_customer" data-id="{{$data->id}}" class="btn btn-info waves-effect waves-light"><i class="fa  fa-eye" aria-hidden="true"></i></button>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody> --}}
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Row -->

@endsection
