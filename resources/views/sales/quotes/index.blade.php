@extends('layouts.main')
@section('contents')

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
    {{-- DataTable Start --}}
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sales Quotes Create</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-xs-10" >
                            <button  class="btn btn-success " id="quote_btn">New Quote</button>
                            <button  class="btn btn-warning">Modify Quote</button>
                            <button class="btn btn-danger">Delete Quote</button>

                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <a href="{{route('sales.index')}}" class="btn btn-danger ">Back</a>
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
                    <span class="mini-stat-icon-2">Total Sales</span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">20544</span>
                        Unique Visitors
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <div id="quote_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl" style="width:60%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title qut_title" id="custom-width-modalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.dashboard')}}" method="POST" id="quote_form">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="" >
                                    <label for="datepicker" class="control-label">Date</label>
                                    <input type="text" class="form-control" placeholder="yyyy/mm/dd" id="datepicker">
                                    {{-- <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> --}}
                                </div><!-- input-group -->
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-2">
                                <label for="reference" class="control-label">Reference</label>
                                <input type="text" class="form-control" placeholder="Reference" id="reference">
                            </div>
                            <div class="col-md-2">
                                <label for="quote_no" class="control-label">Quote No.</label>
                                <input type="text" class="form-control" placeholder="QT123456" id="quote_no" @readonly(true)>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-0">
                                <div class="form-group">
                                    {{-- <label for="customar_id" class="control-label">ID</label> --}}
                                    <input type="hidden" class="form-control" id="customar_id" placeholder="Id" name="customer_id">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="selectdata" class="control-label">Customer Name</label>
                                    <select class="select2" id="selectdata" data-placeholder="Choose a Country...">
                                        <option value="#">Select Customer....</option>
                                        @foreach ($customer as $data)
                                        <option value="{{$data->id}}">{{$data->business_name}} <span>----->{{$data->phone}}</span></option>
                                        @endforeach

                                      </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-0">
                                {{-- <label for="product_id" class="control-label">ID</label> --}}
                                {{-- <input type="hidden" class="form-control" id="product_id" placeholder="Id" name="product_id[0][name]" value="0"> --}}
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="selectdata" class="control-label">Item</label>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="description" class="control-label">Description</label>

                            </div>
                            <div class="col-md-1">
                                <label for="quantity" class="control-label">Qty</label>

                            </div>
                            <div class="col-md-2">
                                <label for="price" class="control-label">Price</label>

                            </div>
                            <div class="col-md-2">
                                <label for="btn" class="control-label">Add Row</label>

                            </div>
                        </div>
                        <div class="" data-x-wrapper="products">
                            <div class="m-b-10" data-x-group>
                                <div class="row">
                                    <div class="col-md-0">
                                        {{-- <label for="product_id" class="control-label">ID</label> --}}
                                        <input type="hidden" class="form-control" id="product_id" placeholder="Id" name="product_id[0][name]" value="0">
                                    </div>
                                    {{-- <input type="hidden" class="form-control" id="product_id"  name="product_id[1][name]"> --}}
                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <select class="form-control" id="selectdata" >
                                                <option value="#">Select Products...</option>
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

                                        <input type="text" class="form-control" id="description" placeholder="Description" name="description">
                                    </div>
                                    <div class="col-md-1">

                                        <input type="number" class="form-control" id="quantity" placeholder="Qty" name="quantity" min="0" value="0">
                                    </div>
                                    <div class="col-md-2">

                                        <input type="number" class="form-control" id="price" placeholder="Price" name="price" min="0" value="0">
                                    </div>
                                    <div class="col-md-2">

                                        <button type="button" class="btn btn-primary" data-add-btn>+</button>
                                        <button type="button" class="btn btn-danger" data-remove-btn>-</button>
                                    </div>
                                </div>
                            </div>
                        </div>


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
                                        <th>Quote No.</th>
                                        <th>Quote Date</th>
                                        <th>Customer Name</th>
                                        <th>Manage</th>
                                        {{-- <th>Salary</th> --}}
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr>
                                        <td>QT2023-420</td>
                                        <td>2011/04/25</td>
                                        <td>System Architect</td>
                                        <td>
                                            <a href="#" class="btn btn-success waves-effect waves-light"><i class="fa  fa-edit" aria-hidden="true"></i> </a>
                                            <a href="#" class="btn btn-danger waves-effect waves-light"><i class="fa  fa-trash" aria-hidden="true"></i> </a>
                                            <a href="{{('/sales/salesquotes/invoice')}}" class="btn btn-info waves-effect waves-light"><i class="fa  fa-eye" aria-hidden="true"></i></a>

                                        </td>
                                        {{-- <td>$320,800</td> --}}
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
@push('quote')

    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                header:{
                    'x-csrf-token' : $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $('#datepicker').datepicker({
                autoclose: true,
                todayHighlight: true,
                todayBtn: "linked",
                format: "yyyy-mm-dd",
                startDate: '-3d',
                endDate: '1d',
            });

            //quotation modal and quotation no
            $(document).on('click','#quote_btn', function(){
                $('#quote_form').trigger('reset');
                $(".qut_title").html('QUOTE');
                $("#quote_modal").modal('show');

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
                document.getElementById('quote_no').value = "QT" + year + "-" + quote_no(3);

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

            });

            jQuery('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '-3d',
                endDate: '1d',
            });

            //add new row in new div
        // var i = 0;

        // $('#add').click(function(){
        //     i++;
        //     $('#newrow').append(

        //         `<div class="row">
        //             <input type="hidden" class="form-control" id="product_id"  name="product_id[`+i+`][name]">
        //             <div class="col-md-4">
        //                 <div class="form-group">
        //                     <select class=" form-control" id="selectdata">
        //                         <option value="#">Select Products...</option>
        //                         <option value="United States">United States</option>
        //                         <option value="United Kingdom">United Kingdom</option>
        //                         <option value="Afghanistan">Afghanistan</option>
        //                         <option value="Aland Islands">Aland Islands</option>
        //                         <option value="Albania">Albania</option>
        //                         <option value="Algeria">Algeria</option>
        //                         <option value="American Samoa">American Samoa</option>
        //                         <option value="Andorra">Andorra</option>
        //                         <option value="Angola">Angola</option>
        //                         <option value="Anguilla">Anguilla</option>
        //                         <option value="Zimbabwe">Zimbabwe</option>
        //                     </select>
        //                 </div>
        //             </div>
        //             <div class="col-md-3">
        //                 <input type="text" class="form-control" id="description" placeholder="Description" name="description">
        //             </div>
        //             <div class="col-md-2">
        //                 <input type="number" class="form-control" id="quantity" placeholder="Qty" name="quantity" min="0" value="0">
        //             </div>

        //             <div class="col-md-2">
        //                 <input type="number" class="form-control" id="price" placeholder="Price" name="price" min="0" value="0">
        //             </div>
        //             <div class="col-md-1">
        //                 <button type="button" class="btn btn-danger" id="remove-row"><i class="fa fa-minus-square" aria-hidden="true"></i></button>
        //             </div>
        //         </div>`

        //     );

        // });
        //remove Row
        // $(document).on('click','#remove-row', function(){
        //     $(this).parents('.row').remove();

        // });

    });

    </script>
@endpush
