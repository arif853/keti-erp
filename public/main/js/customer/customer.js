$(document).ready(function(){

    $(document).on('click','#cus_modal', function(){

        $('#customer_form').trigger('reset');
        $("#cus_title").html('Add Customer');
        $("#submit").html('Add Customer');
        $("#cus-modal-form").modal('show');

    });

    // $('body').on('click','#edit_customer',function(){
    //     var id = $(this).val();

    //     $.get('/ledger/customer/'+id+'/edit',function(res){

    //         $("#cus_title").html('Edit Customer');
    //         $("#update").html('Update Customer');

    //         $("#id").val(res.id);
    //         $("#reference").val(res.reference);
    //         $("#credit_limit").val(res.credit_limit);
    //         $("#customer_id").val(res.id);
    //         $("#business_name").val(res.business_name);
    //         $("#owner_name").val(res.owner_name);
    //         $("#phone").val(res.phone);
    //         $("#phone2").val(res.phone2);
    //         $("#email").val(res.email);
    //         $("#address").val(res.bill_address);
    //         $("#address2").val(res.del_address);
    //         $("#opening_balance").val(res.open_balance);
    //         $("#t_license").val(res.t_license);
    //         $("#tin_number").val(res.tin);
    //         $("#man_name").val(res.man_name);
    //         $("#man_phone").val(res.man_phone);
    //         $("#man_title").val(res.man_title);

    //         $("#edit-modal-form").modal('show');
    //     });
    // });

    var table =  $('#datatable').DataTable( {
        ajax: {
            url: '/ledger/customer/show',
            dataSrc: 'data'
        },
        columns: [
            {"data":"id"},
            {"data":"business_name"},
            {"data":"owner_name"},
            {"data":"man_name"},
            {"data":"man_phone"},
            {"data":"created_at"},
            {
                "data": null,
                render: function(data, type, row) {
                //  return '<button value="'+row.id+'" class="edit btn btn-primary" id="edit_customer" >edit</button>';
                    return '<button id="edit_customer" value="'+row.id+'" class="btn btn-success  waves-effect waves-light "><i class="fa  fa-edit" aria-hidden="true"></i> </button>'+
                    '<button id="delete_customer" value="'+row.id+'" class="btn btn-danger mx-10 waves-effect waves-light"><i class="fa  fa-trash" aria-hidden="true"></i> </button>'+
                    '<button  id="view_customer" value="'+row.id+'" class="btn btn-info  waves-effect waves-light"><i class="fa  fa-eye" aria-hidden="true"></i></button>';

                }
            },
         ]
    } );

    $(document).on('click','#submit',function(e){
        e.preventDefault();
        console.log('clicked');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var data={
            'reference': $('#reference').val(),
            'credit_limit': $('#credit_limit').val(),
            'business_name': $('#business_name').val(),
            'owner_name': $('#owner_name').val(),
            'phone': $('#phone').val(),
            'phone2': $('#phone2').val(),
            'email': $('#email').val(),
            'address': $('#address').val(),
            'address2': $('#address2').val(),
            'acc_group': $('#acc_group').val(),
            'opening_balance': $('#opening_balance').val(),
            't_license': $('#t_license').val(),
            'tin_number': $('#tin_number').val(),
            'man_name': $('#man_name').val(),
            'man_phone': $('#man_phone').val(),
            'man_title': $('#man_title').val(),
        }
        console.log(data);
        $.ajax({
            type:"POST",
            url:"/ledger/customer/store",
            data: data,
            success:function(response){

                $('#cus-modal-form').modal('hide');
                $('#cus-modal-form').find('input').val("");
                $('#saveform_errlist').html("");
                $('#success_message').addClass('alert alert-success');
                $('#success_message').text(response.message)
                table.ajax.reload();

                // console.log(response)
                // if(response.status!=200)
                // {
                //     let error = response.responseJSON;
                //     $('#saveform_errlist').html("");
                //     $('#saveform_errlist').addClass('alert alert-danger');
                //     $.each(error.errors,function(key,err_values){
                //         $('#saveform_errlist').append('<span>'+err_values+'</span>');
                //     });
                // }
                // else{
                // }
            },error:function(response){
                let error = response.responseJSON;
                $.each(error.errors,function(key,err_values){
                    $('.' + key).html("");
                    // $('#saveform_errlist').addClass('text-danger');
                    $('.' + key).append('<span class="text-danger">'+err_values+'</span>');
                });
            }
        });
    });


    // Delete customer
    $(document).on('click','#delete_customer',function(e){
        e.preventDefault();
        var id = $(this).val();
        console.log(id);
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                        });
        confirm('Are you sure want to delete !');

        $.ajax({
            type:"DELETE",
            url: "/ledger/customer/destroy/" + id,
            success:function(response){
                if(response.status==200){
                    $('#success_message').addClass('alert alert-danger');
                    $('#success_message').text(response.message);
                    table.ajax.reload();
                    }
            }
        })
    });
});


