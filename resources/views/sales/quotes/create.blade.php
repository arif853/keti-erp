{{--Add Quote modal  --}}
<div id="quote_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl" style="width:60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title qut_title" id="custom-width-modalLabel"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="quote_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <div class="" >
                                <label for="datepicker" class="control-label">Date</label>
                                <input type="text" class="form-control" name="date" placeholder="yyyy-mm-dd" id="datepicker" required>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-2">
                            <label for="reference" class="control-label">Reference</label>
                            <input type="text" class="form-control" placeholder="Reference" id="reference" name="reference" required>
                        </div>
                        <div class="col-md-2">
                            <label for="quote_no" class="control-label">Quote No.</label>
                            <input type="text" class="form-control" placeholder="QT123456" id="quote_no" name="quote_no" @readonly(true)>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-0">
                            <div class="form-group">
                                {{-- <label for="customar_id" class="control-label">ID</label> --}}
                                {{-- <input type="hidden" class="form-control" id="quote_id" name="quote_id"> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="selectdata" class="control-label">Customer Name</label>
                                <select class="select2 customer" id="selectdata" name="customer" required>
                                    <option value="0" >Select Customer....</option>
                                    @foreach ($customer as $data)
                                    <option  value="{{$data->id}}">{{$data->business_name}} </option>
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
                    <div class="" data-x-wrapper="quote">
                        <div class="m-b-10" data-x-group>
                            <div class="row">
                                <div class="col-md-0">
                                    {{-- <label for="product_id" class="control-label">ID</label> --}}
                                    {{-- <input type="hidden" class="form-control" id="product_id" placeholder="Id" name="product_id[0][name]" value="0"> --}}
                                </div>
                                {{-- <input type="hidden" class="form-control" id="product_id"  name="product_id[1][name]"> --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" id="select_product" name="item" required>
                                            <option value="#">Select Products...</option>
                                            <option value="1">United States</option>
                                            <option value="2">United States</option>
                                            <option value="3">United States</option>
                                            <option value="4">United States</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="description"  placeholder="Description" name="description">
                                </div>
                                <div class="col-md-1">
                                    <input type="number" class="form-control quantity" id="quantity" onchange="Calc(this)" placeholder="Quantity" name="quantity" min="0"  required>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control pprice" id="price" onchange="Calc(this)" placeholder="Price" name="price" min="0" required>
                                    <input type="hidden" class="amt" id="amt" name="amt">
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
                                    <p class="text-right " style="padding-top: 10px;">Total :</p>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text"  placeholder="Total" class="form-control sub-mt" name="FTotal" id="FTotal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light">Submit</button>
                            <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light"><i class="fa fa-print" aria-hidden="true"></i></button>
                            <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light print">Submit & print</button>
                            <button type="button" class="btn btn-default btn-custom waves-effect" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>

    function Calc(v){
            var index = $(v).parent().parent().parent().index();
            // var index = data-x-group.index();
            var qty = document.getElementsByClassName('quantity')[index].value
            var price = document.getElementsByClassName('pprice')[index].value

            var amt = qty * price;

            document.getElementsByClassName('amt')[index].value = amt;

            GetTotal();
        };
    function GetTotal(){

        var sum = 0;
        var amts = document.getElementsByClassName('amt');

        for (let i = 0; i < amts.length; i++) {

            var Getamt = amts[i].value;
            sum = +(sum) +  +(Getamt);
        }

        document.getElementById('FTotal').value = sum;
    }

</script>
