$(document).ready(function(){

    $(document).on('click','#cus_modal', function(){

        $('#customer_form').trigger('reset');
        $("#cus_title").html('Add Customer');
        $("#cus-modal-form").modal('show');

    });


    $(document).on('click','#edit_customer',function(e){
        e.preventDefault();
        var id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url : '/ledger/customer/edit',
                method : 'GET',
                data : {
                    id: id,
                },
                success:function(res){
                    console.log(res);
                    $("#id").val(res.id);

                    $("#reference").val(res.reference);
                    $("#credit_limit").val(res.credit_limit);
                    $("#customer_id").val(res.id);
                    $("#business_name").val(res.business_name);
                    $("#owner_name").val(res.owner_name);
                    $("#phone").val(res.phone);
                    $("#phone2").val(res.phone2);
                    $("#email").val(res.email);
                    $("#address2").val(res.del_address);
                    $("#opening_balance").val(res.open_balance);
                    $("#t_license").val(res.t_license);
                    $("#tin_number").val(res.tin);
                    $("#man_name").val(res.man_name);
                    $("#man_phone").val(res.man_phone);
                    $("#man_title").val(res.man_title);
                    $("#edit_modal_form").modal('show');
                }
        });

    });

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

    $("#customer_form").submit(function(e){
        e.preventDefault();
        const data = new FormData(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url:"/ledger/customer/store/",
            method: 'post',
            data : data,
            cache : false,
            processData: false,
            contentType: false,
            success:function(response){
                if(response.status == 200){
                    $('#cus-modal-form').modal('hide');
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 2000
                      })
                    table.ajax.reload();
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                      })
                }
            }
        })
    });

    $(document).on('click','#delete_customer',function(e){
        e.preventDefault();
        var id = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url : '/ledger/customer/destroy',
                method : 'DELETE',
                data : {
                    id : id,
                },
                success:function(response){
                    Swal.fire(
                        'Deleted!',
                        'Customer Deleted Successfully.',
                        'success'
                      )
                      table.ajax.reload();
                }
              })
            }
          })

    });

});
