@extends('layouts.main')
@section('contents')
@include('inventory.items.brand.create')
@include('inventory.items.category.create')

<div class="row m-t-15">
    <div class="col-md-12">
        <div class="card panel-default">
            <div class="card-header ">
                <div class="pull-left">
                    <h3 class="card-title ">Add Items</h3>
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="#">Inventory</a></li>
                        <li class="breadcrumb-item"><a href="#">Items</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
                <a href="javascript:history.back()" class="btn btn-danger pull-right"><i class="fas fa-reply"></i> back </a>
            </div>
            <div class="card-body clearfix">
                <form id="product_form" action="{{route('items.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="status" class="control-label">Status</label>
                                <select name="status" id="status" class="form-control" >
                                    <option value="NA">Select Status...</option>
                                    <option value="0">Inactive</option>
                                    <option value="1" >Active</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label for="unit" class="control-label">Unit<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="unit" name="unit" placeholder="Add unit pcs or else">
                                <span class="text-danger error-text unit-error"></span>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-0">
                                {{-- <div class="form-group">
                                    <label for="customar_id" class="control-label">ID</label>
                                    <input type="text" class="form-control" id="customer_id" placeholder="Id" readonly>
                                </div> --}}
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="product_name" class="control-label">Product Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name" >
                                    <span class="text-danger error-text product_name-error"></span>
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

                                <label for="brand" class="control-label">Brand<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="brand" id="brand" >
                                      <option selected>Choose...</option>
                                     @foreach ($brands as $brand)
                                        @if ($brand->status == 1)
                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                        @endif
                                     @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#brandModal">+</button>
                                    </div>
                                </div>
                                <span class="text-danger error-text brand-error"></span>
                            </div>
                            <div class="col-lg-3">
                                <label for="catagory" class="control-label">Catagory<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="brand" id="brand" >
                                      <option selected>Choose...</option>
                                      <option value="1">One</option>
                                      <option value="2">Two</option>
                                      <option value="3">Three</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#categoryModal">+</button>
                                    </div>
                                </div>
                                <span class="text-danger error-text catagory-error"></span>
                            </div>
                            {{-- <div class="col-lg-3">
                                <label for="group" class="control-label">Group</label>
                                <select name="group" id="group" class="select2">
                                    <option value="NA">Select Group...</option>
                                </select>
                            </div> --}}
                            <div class="col-lg-3">
                                <label for="model" class="control-label">Model</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="brand" id="brand" >
                                      <option selected>Choose...</option>
                                      <option value="1">One</option>
                                      <option value="2">Two</option>
                                      <option value="3">Three</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="button">+</button>
                                    </div>
                                </div>
                                <span class="text-danger error-text model-error"></span>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-2 ">
                                <label for="barcode" class="control-label"> Product Barcode</label>
                                <p>{!! DNS1D::getBarcodeSVG($barcode, 'EAN13','2','55') !!}</p>
                                <input type="hidden" value=" {{$barcode}}" name="barcode" >

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="product_cost" class="control-label">Product Cost<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="product_cost" placeholder="৳ Cost" name="product_cost" onchange="cost()">
                                </div>
                                <span class="text-danger error-text product_cost-error"></span>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="vat" class="control-label">VAT %</label>
                                    <input type="text" class="form-control" id="vat" placeholder="VAT %" name="vat" onchange="cost()">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="o_charge" class="control-label">Other Charge</label>
                                    <input type="text" class="form-control" id="o_charge" placeholder="Other Charge" name="o_charge" onchange="cost()">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="mrp" class="control-label">M.R.P(Click me)</label>
                                    <input type="text" class="form-control mrp" id="mrp" placeholder="৳ MRP" name="mrp" readonly>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit" class="btn btn-primary btn-custom waves-effect waves-light submit pull-right">Save</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
<script>
    //costcalulation
    function cost(){

        let mrps = 0;
        mrps = costcount();
        // console.log(mrps);
        document.getElementById('mrp').value = mrps;
    };
    function costcount() {
        var cost =  document.getElementById("product_cost").value;
        var vat =  document.getElementById("vat").value;
        var o_charge =  document.getElementById("o_charge").value;

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

    $(document).ready(function(){

        // Handle brand form submission
        $("#brand_form").submit(function(e) {
            e.preventDefault();
            // Serialize the form data
            const formData = new FormData(this);
            // console.log(formData);
            // Set up AJAX headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Send an AJAX request to the server
            $.ajax({
                url: '{{url('/inventory/items/brand/store')}}',
                method: 'post',
                data: formData,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function(response) {
                    // console.log(response);
                    if (response == 200) {
                        // Hide the modal and show a success message
                        $('#brandModal').modal('hide');
                        location.reload();
                    }
                },error: function(response) {
                    console.log(response);
                    $('#brandModal').modal('hide');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.errors,
                    });
                }
            });
        });
    });

</script>
@endpush
