@extends('layouts.main')
@section('contents')
@include('sales.quotes.edit')
@include('sales.quotes.create')
<div class="row">
    <div class="col-lg-12">
        <h2 class="pull-left page-title">Sales Quotes !</h2>
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="#">Sales</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quote</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Sales Quotes Create</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12" >
                        <div class="d-flex justify-content-between">
                            <div class="left">
                                <button  class="btn btn-success " id="quote_btn">New Quote</button>
                                {{-- <button  class="btn btn-warning">Modify Quote</button>
                                <button class="btn btn-danger">Delete Quote</button> --}}
                            </div>
                            <div class="right">
                                <a href="{{route('sales.index')}}" class="btn btn-danger ">Back</a>
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
                <h3 class="panel-title">Sales Quotes Summary</h3>
            </div>
            <div class="mini-stat-quote clearfix bx-shadow">
                <span class="mini-stat-icon-2">Total Quotes</span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{$quoteCount->count()}}</span>

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
                <h3 class="panel-title">Sales Quotes Table</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Quote No.</th>
                                    <th>Quote Date</th>
                                    <th>Customer Name</th>
                                    <th>Barcode</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>


                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Row -->

@endsection

@push('quote')
    <script>
        $(document).ready(function(){

                //quotation modal and quotation no
            $(document).on('click','#quote_btn', function(){

                $('#quote_form').trigger('reset');
                $(".qut_title").html('QUOTE');

                // qoute number generator
                function quote_no(N){
                    var random_string = '';
                    var numbers = '1234567890';

                    for(var i , i = 0; i < N; i++ )
                    {
                        random_string += numbers.charAt(Math.floor(Math.random() * numbers.length))
                    }
                    return random_string;
                }
                var date = new Date();
                var year = date.getFullYear();
                document.getElementById('quote_no').value = "QT" + year + "-" + quote_no(4);
                // console.log(quote_no(4));

                $("#quote_modal").modal('show');

                //New row generator
                const selector = '[data-x-wrapper]';
                    let options = {
                        disableNaming: '[data-disable-naming]',
                        wrapper: selector,
                        group: '[data-x-group]',
                        addBtn: '[data-add-btn]',
                        removeBtn: '[data-remove-btn]'
                    };
                $(selector).replicate(options);

                $('#datepicker').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    todayBtn: "linked",
                    format: "yyyy-mm-dd",
                    startDate: '-3d',
                    endDate: '1d',
                });
            });

            //Quote editform modal
            $(document).on('click', '#edit_quote', function (e) {
                e.preventDefault();

                $("#quote_edit_modal").modal('show');
                $(".qut_title").html('QUOTE Update');
                let id = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/sales/quote/edit',
                    method: 'GET',
                    data: {
                        id: id,
                    },
                    success: function (response) {
                        console.log(response);

                        var data = response;
                            // console.log(response[data[0]].quote_date);
                        data.data.forEach( element =>{

                            $("#editdatepicker").val(element.quote_date);
                            $("#reference").val(element.reference);
                            $("#quoteno").val(element.quotation);
                            $("#customer").text(element.business_name);

                            $("#select_product").text(element.items);
                            $("#description").text(element.description);
                            $("#quantity").text(element.quantity);
                            $("#price").text(element.price);
                        });

                    }
                });
            });

            //DataTable Data view
            var table = $('#datatable').DataTable({
                        ajax: {
                url: '/sales/quote/datatable',
                dataSrc: 'data'

                },
                columns: [
                    {
                        "data": "quotation_no"
                    },
                    {
                        "data": "quote_date"
                    },
                    {
                        "data": "business_name"
                    },
                    {
                        "data": null,
                        render: function (data, type, row) {
                            return  'Barcode ';
                        }
                    },
                    {
                        "data": null,

                        render: function (data, type, row) {
                            //  return '<button value="'+row.id+'" class="edit btn btn-primary" id="edit_customer" >edit</button>';
                            return '<button id="edit_quote" value="' + row.quotation_no +
                                '" class="btn btn-success  waves-effect waves-light "><i class="fa  fa-edit" aria-hidden="true"></i> </button>' +
                                '<button id="delete_quote" value="' + row.quotation_no +
                                '" class="btn btn-danger mx-10 waves-effect waves-light"><i class="fa  fa-trash" aria-hidden="true"></i> </button>' +
                                '<a  id="view_quote" href="{{('/sales/quote/show/')}}'+ row.quotation_no +'" target="_blank" class="btn btn-info  waves-effect waves-light"><i class="fa  fa-eye" aria-hidden="true"></i></a>'+
                                '<a id="print_quote" href="{{('/sales/quote/quote_invoice/')}}'+ row.quotation_no +'" value="' + row.quotation_no +
                                '" class="btn btn-danger mx-10 waves-effect waves-light"><i class="fa fa-print" aria-hidden="true"></i> </a>';
                                //href="{{('/sales/quote/show/')}}'+ row.quotation_no +'"
                        }
                    },
                ]
            });


            // Handle form submission
            $("#quote_form").submit(function(e) {
                e.preventDefault();

                // Serialize the form data
                const formData = new FormData(this);

                // Set up AJAX headers
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // console.log(formData);
                // Send an AJAX request to the server
                $.ajax({
                    url: '/sales/quote/store',
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
                            $('#quote_modal').modal('hide');
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                text: response.message,
                                title: 'Congatulation!',
                                showConfirmButton: false,
                                timer: 4000
                            });
                            table.ajax.reload();
                            // Optionally, you can redirect to another page here
                            // window.location.href = '/success-page';
                        }
                        if(response.status == 2){

                            $.each(response.error, function (field, errors) {

                            // For non-dynamic fields, display errors as before
                            $('span.' + field + '-error').text(errors[0]);
                            // console.log(field);
                            // console.log(errors);

                            // Check if the field is dynamic (e.g., "quote.0.item")
                            if (field.includes('quote.')) {
                                // Extract the dynamic field name and index
                                var fieldParts = field.split('.');
                                var index = fieldParts[1]; // Get the dynamic field name
                                var fieldName = fieldParts[2]; // Get the dynamic field index
                                console.log(fieldName);
                                console.log(index);

                                // Display the error message for the dynamic field
                                $('span.' + fieldName + '-error[data-index="' + index + '"]').text(errors[0]);
                            }
                            });
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

                    }
                });
            });

             //delete quote
            $(document).on('click', '#delete_quote', function (e) {
                e.preventDefault();
                var id = $(this).val();
                console.log(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/sales/quote/destroy',
                            method: 'DELETE',
                            data: {
                                id: id,
                            },
                            success: function (response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Customer Deleted Successfully.',
                                    'success'
                                )
                                table.ajax.reload();
                            }
                        })
                    }
                })
            });

            $('#editdatepicker').datepicker({
                autoclose: true,
                todayHighlight: true,
                todayBtn: "linked",
                format: "yyyy-mm-dd",
                startDate: '-3d',
                endDate: '1d',
            });

            // $(document).on('click','#print_quote', function () {
            //     // Gather data from your form or API, and populate the invoice content
            //     const invoiceData = {
            //         // Your data here
            //     };

            //     const pdf = new jsPDF();
            //     const invoiceHTML = document.getElementById('invoice');

            //     // Convert the HTML content to a PDF
            //     pdf.fromHTML(invoiceHTML, 15, 15);

            //     // Print the PDF
            //     pdf.autoPrint();

            //     // Open the print dialog
            //     window.print();
            // });

        });

    </script>



@endpush


