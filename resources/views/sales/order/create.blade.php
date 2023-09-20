{{-- Add Order modal --}}
<div id="order_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl" style="width:60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center" id="custom-width-modalLabel">ORDER</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="order_form">
                <div class="modal-body">
                    <div class="row" >
                        <div class="col-md-2">
                            <label for="datepicker" class="control-label">Date*</label>
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="datepicker" name="order_date" required >
                            <span class="text-danger">
                                @error('order_date')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-2">
                            <label for="reference" class="control-label">Reference</label>
                            <input type="text" class="form-control" placeholder="Reference" id="reference" name="reference">
                        </div>
                        <div class="col-md-2">
                            <label for="order_no" class="control-label">Order No.*</label>
                            <input type="text" class="form-control" placeholder="OR012-345" id="order_no" name="order_no" required readonly>
                            <span class="text-danger">
                                @error('order_no')
                                    {{$message}}
                                @enderror
                            </span>
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
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="selectdata" class="control-label" >Customer Name*</label>
                                <select class="select2" id="selectdata" name="customer" required>
                                    <option value="#">Select Customer...</option>
                                    @foreach ($customer as $data)
                                        <option value="{{$data->id}}">{{$data->business_name}}</option>

                                    @endforeach
                                  </select>
                                  <span class="text-danger">
                                    @error('customer')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="selectdata" class="control-label">Item*</label>
                        </div>
                        <div class="col-lg-2">
                            <label for="quantity" class="control-label">Qty*</label>
                        </div>
                        <div class="col-lg-2">
                            <label for="discount" class="control-label">Discount(%)</label>
                        </div>
                        <div class="col-lg-2">
                            <label for="price" class="control-label">Price</label>
                        </div>
                        <div class="col-lg-2">
                            <label for="btn" class="control-label">Add Row</label>
                        </div>
                    </div>
                    <div class="" data-x-wrapper="order">
                        <div class="m-b-10" data-x-group>
                            <div class="row" >
                                <div class="oder_id">
                                    {{-- <label for="product-id" class="control-label">ID</label> --}}
                                    <input type="hidden" class="form-control" id="product_id"  name="product_id" >
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control" id="items" name="items">
                                            <option value="0">Select Product...</option>
                                            <option value="1">United States</option>
                                            <option value="2">Bangladesh</option>
                                            <option value="3">Africa</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('items')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <input type="number" class="form-control qty" id="quantity" onchange="Calc(this)" placeholder="Qty" name="quantity" min="0" required>
                                    <span class="text-danger">
                                        @error('quantity')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-lg-2">
                                    <input type="number" class="form-control discount" id="discount" onchange="Calc(this)"  placeholder="Discount" name="discount" min="0"  >
                                </div>
                                <div class="col-lg-2">
                                    <input type="number" class="form-control Iprice" id="price" onchange="Calc(this)" placeholder="Price" name="price" min="0"  required>
                                    <span class="text-danger">
                                        @error('price')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <input type="hidden" class="amt" id="amt" name="amt">
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-primary" data-add-btn>+</button>
                                    <button type="button" class="btn btn-danger" data-remove-btn>-</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="order_row"></div>
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-right " style="padding-top: 7px;">Subtotal :</p>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text"  placeholder="Subtotal" class="form-control" name="subtotal" id="subtotal">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-right " style="padding-top: 10px;">Total Discount :</p>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text"  placeholder="Discount" class="form-control sub-mt" name="Tdiscount" id="Tdiscount">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-right " style="padding-top: 10px;">VAT :</p>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text"  placeholder="Vat" class="form-control sub-mt" name="vat" value="0" id="vat" onchange="GetTotal()">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-right " style="padding-top: 10px;">Total :</p>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text"  placeholder="Total" class="form-control sub-mt" id="Ftotal" name="Ftotal">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light">Submit</button>
                    <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light">Submit & print</button>
                    <button type="button" class="btn btn-default btn-custom waves-effect" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    function Calc(v){
        var index = $(v).parent().parent().parent().index();
        // var index = data-x-group.index();
        var qty = document.getElementsByClassName('qty')[index].value
        var price = document.getElementsByClassName('Iprice')[index].value
        var discount = document.getElementsByClassName('discount')[index].value

        var amt = qty * price ;
        if(discount>0){
            var amt = +(amt) - +(amt*discount)/100;
        }

        document.getElementsByClassName('amt')[index].value = amt;

        GetSubTotal();
        GetDiscount();
    };
    function GetSubTotal(){

        var sum = 0;
        var amts = document.getElementsByClassName('amt');


        for (let i = 0; i < amts.length; i++) {

            var Getamt = amts[i].value;
            sum = +(sum) +  +(Getamt);
        }
        document.getElementById('subtotal').value = sum;
        GetTotal()
    };

    function GetTotal(){
        var vat = document.getElementById('vat').value;
        var SubTotal =  document.getElementById('subtotal').value

        if (vat>0){
            var TotalAmt = +(SubTotal) + +(SubTotal*vat)/100;
        }
        else{
            TotalAmt = SubTotal;
        }
        document.getElementById('Ftotal').value = TotalAmt;
    }

    function GetDiscount(){

        var sum = 0
        var discount = document.getElementsByClassName('discount')
        for (let i = 0; i < discount.length; i++) {

        var Getdiscount = discount[i].value;
        sum = +(sum) +  +(Getdiscount);
        }

        document.getElementById('Tdiscount').value = sum;
    }
</script>
