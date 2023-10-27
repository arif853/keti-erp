{{-- product add modal --}}
<div id="product_modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="cus_title"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="product_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <label for="status" class="control-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="NA">Select Status...</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label for="unit" class="control-label">Unit<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="PCS" id="unit" name="unit">
                            <span class="text-danger error-text unit-error"></span>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-3">
                            <label for="barcode" class="control-label">Barcode</label>
                            {{-- <img src="data:image/png,' . DNS1D::getBarcodePNG('94345256811', 'EAN13','2','40') . '" alt="barcode"   /> --}}
                            <input type="text" class="form-control" placeholder="Barcode" id="barcode" name="barcode">

                        </div>
                        <div class="col-lg-3">
                            <label for="barcode" class="control-label"> </label>
                            <p>{!! DNS1D::getBarcodeSVG('94345256811', 'EAN13','2','40') !!}</p>
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
                            <select name="brand" id="brand" class="select2">
                                <option value="0">Select Brand...</option>
                                <option value="1">Brand-1</option>
                                <option value="2">Brand-2</option>
                            </select>
                            <span class="text-danger error-text brand-error"></span>
                        </div>
                        <div class="col-lg-3">
                            <label for="catagory" class="control-label">Catagory<span class="text-danger">*</span></label>
                            <select name="catagory" id="catagory" class="select2">
                                <option value="0">Select Catagory...</option>
                                <option value="1">Catagory-1</option>
                                <option value="2">Catagory-2</option>
                            </select>
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
                            <select name="model" id="model" class="select2">
                                <option value="0">Select Model...</option>
                                <option value="1">Model-1</option>
                                <option value="2">Model-2</option>
                            </select>
                            <span class="text-danger error-text model-error"></span>
                        </div>
                    </div>
                </div>
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

                <div class="modal-footer">
                    <button type="submit" id="submit" class="btn btn-primary btn-custom waves-effect waves-light submit">Add Item</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
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





</script>
