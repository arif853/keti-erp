{{-- product issue modal --}}
<div id="product_issue_modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="cus_title"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="product_issue_form" method="POST">
                <div class="modal-body" >

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="" >
                                <label for="datepicker" class="control-label">Date</label>
                                <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="datepicker">
                                {{-- <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> --}}
                            </div><!-- input-group -->
                        </div>
                        <div class="col-lg-3">
                            <label for="store" class="control-label">Store</label>
                            <select name="select2" class="select2" id="store_select" placeholder="Store Location">
                                <option value="1">Store-1</option>
                                <option value="2">Store-2</option>
                                <option value="3">Store-3</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="products" class="control-label">Products</label>
                        </div>
                        <div class="col-lg-4">
                            <label for="quantity" class="control-label">Quantity</label>
                        </div>
                        <div class="col-lg-2">
                            <label for="add_row" class="control-label">Add row</label>
                        </div>
                    </div>
                    <div class="" data-x-wrapper="products">
                        <div class="inventory_group m-b-10" data-x-group>
                            <div class="row">
                                <div class="col-lg-6">
                                    <select class="select2" name="products" id="products" required>
                                        <option value="0">Select Product...</option>
                                        @foreach ($itemData as $item)
                                        <option value="{{$item->id}}">{{$item->product_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <input type="number" value="" min="0" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-primary" data-add-btn>+</button>
                                    <button type="button" class="btn btn-danger" data-remove-btn>-</button>
                                </div>
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
