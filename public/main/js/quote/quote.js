
$(document).ready(function(){

    $.ajaxSetup({
        header:{
            'x-csrf-token' : $('meta[name="csrf-token"]').attr('content'),
        }
    });


    $('.select2').select2({
        width : "100%",
    });
    //Quotemodal
    $("#quote_modal").on('click', function(){
            $("#quote-modal-form").modal('show');
        });

});




