
$(document).ready(function(){
    $.ajaxSetup({
        header:{
            'x-csrf-token' : $('meta[name="csrf-token"]').attr('content'),
        }
    });
});

//Quotemodal
$("#quote_modal").on('click', function(){
console.log('Clicked');
    $("#quote-modal-form").modal('show');
});


