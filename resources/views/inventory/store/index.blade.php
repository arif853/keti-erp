@extends('layouts.main')
@section('contents')

<div class="row">
    <div class="col-lg-12">
        <h2 class="pull-left page-title">STORE</h2>
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb pull-right">
              <li class="breadcrumb-item"><a href="#">Inventory</a></li>
              <li class="breadcrumb-item active" aria-current="page">Store</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Store </h3>
            </div>
            <div class="panel-body clearfix">
                <div class="row ">
                    <div class="col-lg-12 ">
                        <div class="d-flex justify-content-between">
                            <div class="left">
                                <button class="btn btn-success" id="modal_btn">Add Store</button>
                            </div>
                            <div class="right">
                                <button class="btn btn-danger" id="back_btn">Back</button>
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
                <h3 class="panel-title">Store Summary</h3>
            </div>
            <div class="mini-stat-quote  ">
                <span class="mini-stat-icon-2">Total Store</span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">10</span>
                    Stores
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Store add modal --}}
<div id="store_modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="cus_title"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="store_form" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="status" class="control-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="NA">Select Status...</option>
                                <option value="1">Open</option>
                                <option value="0">Close</option>
                            </select>
                        </div>
                        <div class="col-lg-6"></div>
                        <div class="col-lg-3">
                            <label for="store_code" class="control-label">Store Code</label>
                            <input type="text" class="form-control" placeholder="ST-MN-01" id="store_code" name="store_code">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="store_id" class="control-label">ID</label>
                                    <input type="text" class="form-control" id="store_id" placeholder="Store ID" name="store_id">
                                </div>
                            </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="store_name" class="control-label">Store Name*</label>
                                <input type="text" class="form-control" id="store_name" placeholder="Store Name" name="store_name" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="store_location" class="control-label">Store Location*</label>
                                <input type="text" class="form-control" id="store_location" placeholder="Product Name" name="store_location" required>
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
                <h3 class="panel-title">Store Table</h3>

            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <table id="datatable" class="table table-striped table-bordered mytable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Store Name</th>
                                    <th>Location</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <p class="badge badge-success">Open</p>
                                    </td>
                                    <td>Bata Lether Shoe</td>
                                    <td>Dhaka</td>
                                    <td>
                                        <a href="#" class="btn btn-success waves-effect waves-dark"><i class="fa  fa-edit" aria-hidden="true"></i> </a>
                                        <a href="#" class="btn btn-danger waves-effect waves-light"><i class="fa  fa-trash" aria-hidden="true"></i> </a>
                                        <a href="#" class="btn btn-info waves-effect waves-light"><i class="fa  fa-eye" aria-hidden="true"></i></a>

                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <p class="badge badge-danger">Close</p>
                                    </td>
                                    <td>Bata Lether Shoe</td>
                                    <td>Chittagong</td>
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
@push('store')
    <script>

        $(document).on('click', '#modal_btn', function () {

            document.getElementById('store_form').reset();
            $("#cus_title").html('Add Store');
            $("#store_modal").modal('show');

        });
        $('#back_btn').on('click',function(){
            location.href = "{{(route('items.index'))}}"
        })
    </script>
@endpush
