{{-- Edit order modal --}}

<div id="order_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl" style="width:60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center" id="custom-width-modalLabel">ORDER</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{route('admin.dashboard')}}" method="POST" id="order_form">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">

                            <label for="datepicker" class="control-label">Date*</label>
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="datepicker" required >

                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-2">
                            <label for="reference" class="control-label">Reference</label>
                            <input type="text" class="form-control" placeholder="Reference" id="reference">
                        </div>
                        <div class="col-md-2">
                            <label for="order_no" class="control-label">Order No.*</label>
                            <input type="text" class="form-control" placeholder="OR012-345" id="order_no" required readonly>
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
                                <select class="select2" id="selectdata"  required>
                                    <option value="#">Select Customer...</option>
                                    @foreach ($customer as $data)
                                    <option value="{{$data->id}}">{{$data->business_name}}</option>

                                    @endforeach
                                  </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="oder_id">
                            {{-- <label for="product-id" class="control-label">ID</label> --}}
                            <input type="hidden" class="form-control" id="product_id" value="0" name="product_id[0][name]" >
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="selectdata" class="control-label">Item*</label>
                                <select class="form-control" id="select_product"  required>
                                    <option value="#">Select Product...</option>
                                    <option value="United States">United States</option>
                                    <option value="United States">Bangladesh</option>
                                    <option value="United States">Africa</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label for="quantity" class="control-label">Qty*</label>
                            <input type="number" class="form-control" id="quantity" placeholder="Qty" name="quantity" min="0" value="0" required>
                        </div>
                        <div class="col-md-2">
                            <label for="discount" class="control-label">Discount(%)</label>
                            <input type="number" class="form-control" id="discount" placeholder="Discount" name="discount" min="0" value="0" >
                        </div>
                        <div class="col-md-2">
                            <label for="price" class="control-label">Price</label>
                            <input type="number" class="form-control" id="price" placeholder="Price" name="price" min="0" value="0">
                        </div>

                        <div class="col-md-1">
                            <label for="btn" class="control-label">Add Row</label>
                            <button type="button" class="btn btn-success btn-custom" id="add"><i class="fa fa-plus-square" aria-hidden="true"></i>
                            </button>
                            {{-- <button type="button" class="btn btn-danger" id="remove-row">remove </button> --}}
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
