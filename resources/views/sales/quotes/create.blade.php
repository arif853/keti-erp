{{--Add Quote modal  --}}
<div id="quote_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl" style="width:60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title qut_title" id="custom-width-modalLabel"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="quote_form">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="" >
                                <label for="datepicker" class="control-label">Date</label>
                                <input type="text" class="form-control" name="date" placeholder="yyyy-mm-dd" id="datepicker" >
                                <span class="text-danger error-text date-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-2">
                            <label for="reference" class="control-label">Reference</label>
                            <input type="text" class="form-control" placeholder="Reference" id="reference" name="reference" >
                            <span class="text-danger error-text reference-error"></span>
                        </div>
                        <div class="col-md-2">
                            <label for="quote_no" class="control-label">Quote No.</label>
                            <input type="text" class="form-control" placeholder="QT123456" id="quote_no" name="quote_no" @readonly(true)>
                            <span class="text-danger error-text quote_no-error"></span>
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
                                <select class="select2 customer" id="selectdata" name="customer" >
                                    <option value="" >Select Customer....</option>
                                    @foreach ($customer as $data)
                                    <option  value="{{$data->id}}">{{$data->business_name}} </option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text customer-error"></span>
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
                        <div class="col-md-1">
                            <label for="Stock" class="control-label">Stock</label>

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
                     <!-- Dynamic input fields -->
                    <div class="" data-x-wrapper="quote">
                        @foreach (old('quote', [0 => []]) as $key => $quoteItem)
                        <div class="m-b-10" data-x-group>
                            <div class="row dynamic-input">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="item" data-field="item" id="items">
                                            <option value="0" @selected(true)>Select Products...</option>
                                            @foreach ($items as $item)
                                            <option value="{{$item->id}}">{{$item->product_name}} </option>
                                            @endforeach
                                        </select>
                                        {{-- @if ($errors->has('quote.' . $key . '.item'))
                                        <span class="text-danger error-text">{{ $errors->first('quote.' . $key . '.item') }}</span>
                                        @endif --}}
                                        <span class="text-danger error-text item-error" data-index={{$key}}></span>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    {{-- <input type="text" class="form-control" name="description" data-field="description" placeholder="Description"> --}}
                                    {{-- @if ($errors->has('quote.' . $key . '.description'))
                                        <span class="text-danger error-text">{{ $errors->first('quote.' . $key . '.description') }}</span>
                                    @endif --}}
                                    {{-- <span class="text-danger error-text description-error" data-index={{$key}}></span> --}}
                                </div>
                                <div class="col-md-1">
                                    <input type="number" class="form-control quantity" name="quantity" data-field="quantity" onchange="Calc(this)" placeholder="Quantity" min="0">
                                    <span class="text-danger error-text quantity-error" data-index={{$key}}></span>
                                    {{-- @if ($errors->has('quote.' . $key . '.quantity'))
                                        <span class="text-danger error-text">{{ $errors->first('quote.' . $key . '.quantity') }}</span>
                                    @endif --}}
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control pprice" name="price" data-field="price"  onchange="Calc(this)" placeholder="Price" min="0">
                                    <input type="hidden" class="amt" name="amt" data-field="amt">
                                    {{-- @if ($errors->has('quote.' . $key . '.price'))
                                        <span class="text-danger error-text">{{ $errors->first('quote.' . $key . '.price') }}</span>
                                    @endif --}}
                                    <span class="text-danger error-text price-error" data-index={{$key}}></span>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary" data-add-btn>+</button>
                                    <button type="button" class="btn btn-danger" data-remove-btn>-</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light">Submit</button>
                    <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light"><i class="fa fa-print" aria-hidden="true"></i></button>
                    <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light print">Submit & print</button>
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
