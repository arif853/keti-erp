@extends('layouts.main')
@section('contents')
@include('inventory.items.edit')
@include('inventory.items.create')
@include('inventory.items.issue')

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
                        <a class="btn btn-success" id="store_btn" >Store</a>
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

            //Show add modal form
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

                var usedNumbers = []; // Keep track of generated numbers

                function uniqueRandomNumber(N) {
                    var maxAttempts = 1000; // Maximum attempts to generate a unique number

                    for (var attempt = 0; attempt < maxAttempts; attempt++) {
                        var randomNum = barCode(N);

                        // Check if the generated number is unique
                        if (!usedNumbers.includes(randomNum)) {
                            usedNumbers.push(randomNum);
                            return randomNum;
                        }
                    }

                    // If maximum attempts are reached, you can handle the error here
                    console.error('Unable to generate a unique number.');
                    return null; // Or handle the error in a different way
                }
                function barCode(N) {
                    var random_string = '';
                    var numbers = '0123456789';

                    for (var i = 0; i < N; i++) {
                        random_string += numbers.charAt(Math.floor(Math.random() * numbers.length));
                    }

                    return random_string;
                }
                document.getElementById('barcode').value = "49" + barCode(9);
            });

            //issue product modal button
            $(document).on('click', '#item_issue', function () {

                document.getElementById('product_issue_form').reset();
                $("#cus_title").html('Add Item');
                $("#product_issue_modal").modal('show');

            });

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
            $('#store_btn').on('click', function(){
                location.href = "{{route('store.index')}}"
            });

            // Handle form submission

            $("#product_form").submit(function(e) {
                e.preventDefault();

                // Serialize the form data
                const formData = new FormData(this);

                // Set up AJAX headers
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // Send an AJAX request to the server
                $.ajax({
                    url: '/inventory/items/store',
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        // Clear any previous error messages
                        $(document).find('span.error-text').text('');
                    },success: function(response) {
                        if (response.status == 200) {
                            // Hide the modal and show a success message
                            $('#product_modal').modal('hide');
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                text: response.message,
                                title: 'Congatulation!',
                                showConfirmButton: false,
                                timer: 4000
                            });
                            // table.ajax.reload();
                            // Optionally, you can redirect to another page here
                            // window.location.href = '/success-page';
                        }


                    },error: function(response) {
                        if (response.status == 0) {
                            // Show an error message for a general error
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Quotation has an error!',
                            });
                        }
                        if(response.status == 2){

                        $.each(response.error, function (field, errors) {
                            console.log(field);
                            console.log(errors);
                            $('span.' + field + '-error').text(errors[0]);

                            });
                        }

                    }
                });
            });
        });

    </script>
@endpush
