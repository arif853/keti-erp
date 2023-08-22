@extends('layouts.main')
@section('contents')

<div class="row">
    <div class="col-lg-12">
        <h2 class="pull-left page-title">Products Page</h2>
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
                <h3 class="panel-title">Add Products</h3>
            </div>
            <div class="panel-body clearfix">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-success " id="cus_modal">Add Item</button>
                        <button class="btn btn-success " id="cus_modal">Store</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Product Summary</h3>
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

<div id="cus-modal-form" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="cus_title"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <form id="customer_form" method="POST">
                <div class="modal-body">

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
                                <input type="text" class="form-control" id="product_name" placeholder="Product Name"
                                    name="product_name" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="product_img" class="control-label">Product Image</label>
                                <input type="file" class="form-control" id="product_img" placeholder="Image"
                                    name="product_img" >
                                {{-- <input type="file"class="form-control" name="image" id="image_file" > --}}

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="img-output">
                                <img id="output"  width="100" alt=""/>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="phone" class="control-label">Primary Phone*</label>
                            <input type="text" class="form-control" placeholder="+880 " id="phone" name="phone"
                                required>
                        </div>
                        <div class="col-md-3">
                            <label for="phone2" class="control-label">Secondary Phone</label>
                            <input type="text" class="form-control" placeholder="+880 " id="phone2" name="phone2">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" class="form-control" placeholder="example@email.com" id="email"
                                name="email">
                        </div>
                    </div>
                    {{-- <p style="margin-top: 10px"></p> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <label for="address2" class="control-label">Delivary Address*</label>
                            <textarea type="text" class="form-control" placeholder="Address.... " id="address2"
                                name="address2" required></textarea>
                            <div id="saveform_errlist" class="address2"></div>
                        </div>
                    </div>
                    {{-- <p style="margin-top: 15px"></p> --}}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="acc_group" class="control-label">Account Group</label>
                                <select class="select2" id="acc_group" name="acc_group">
                                    <option value="#">Select Group....</option>
                                    {{-- @foreach ($groups as $data)
                                    <option value="{{$data->id}}">{{$data->group_name}}</option>
                                    @endforeach --}}

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="open_balance" class="control-label">Opening Balance</label>
                            <input type="number" min="0" class="form-control alert-success"
                                placeholder="Opening Balance " id="open_balance" name="open_balance">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="t_license" class="control-label">Trade License</label>
                            <input type="text" class="form-control " placeholder="Trade License " id="t_license"
                                name="t_license">
                        </div>
                        <div class="col-md-2">
                            <label for="tin_number" class="control-label">TIN Number</label>
                            <input type="text" class="form-control " placeholder="Tin Number " id="tin_number"
                                name="tin_number">
                        </div>
                        <div class="col-md-6"></div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit"
                        class="btn btn-primary btn-custom waves-effect waves-light submit">Add Item</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@push("items")
    <script>
        $(document).ready(function(){
            $(document).on('click', '#cus_modal', function () {

                $('#customer_form').trigger('reset');
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
