
var i = 0;

$('#add').click(function(){

    ++i;
    $('#goob').append(

        `<div class="row" id="rm-rw">
            <div class="col-md-1">
                <input type="text" class="form-control" id="product-id" placeholder="Id" name="product-id[`+i+`][name]" readonly>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select class="select2" id="selectdata" data-placeholder="Choose a Country...">
                        <option value="#">&nbsp;</option>
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
            <div class="col-md-2">

                <input type="number" class="form-control" id="quantity" placeholder="Qty" name="quantity">
            </div>
            <div class="col-md-2">

                <input type="number" class="form-control" id="price" placeholder="Price" name="price">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger" id="remove-row">remove </button>
            </div>
        </div>`

    );
    //  console.log('Cliked');
});

$(document).on('click','#remove-row', function(){
    $(this).parents('#rm-rw').remove();
    // console.log('Clicked on remove')
});
