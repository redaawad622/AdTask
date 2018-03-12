$(document).ready(function () {

    $('#counter').val('1');
    $('#count').val('0');


});



/*create page*/

$('#add_item').click(function () {
    var count = $("#create_list").children().length;
    var counter=count-4;
   $(
    '<div class="form-group">'+
        '<label class="label-icon"><i class="fas fa-list-ul"></i></label>'+
    '<input type="text" class="form-control" name="item'+counter+ '" placeholder="add item" required>'+
    '</div>'
    ).insertBefore('.all_button');
   $('#counter').val(counter+1);
});

/*show page*/
$('#add_new_item').click(function () {
    var count = $("#create_list").children().length;
    var counter=count-3;
   $(
    '<div class="form-group">'+
        '<label class="label-icon"><i class="fas fa-list-ul"></i></label>'+
    '<input type="text" class="form-control" name="item'+counter+ '" placeholder="add item" required>'+
    '</div>'
    ).insertBefore('.all_button');
   $('#count').val(counter+1);
   $('.show_list .inner_list #submit_new_item').show();
});

$('.general').click(function () {
   var id=$(this).attr('id');
   var content=$('.'+id+' p').text();
   var header=$('#'+id+' i').attr('id');
    $.confirm({
        title: 'Update Current Item',
        theme:'modern',
        content: '' +
        '<form action="" class="formName">' +
        '<div class="form-group">' +
        '<label style="text-align: left !important;">Update Item</label>' +
        '<input type="text" placeholder="update item" class="name form-control" value="'+content+'" required />' +
        '</div>' +
        '</form>',
        buttons: {
            formSubmit: {
                text: 'Submit',
                btnClass: 'btn-green',
                action: function () {
                    var name = this.$content.find('.name').val();
                    if(!name){
                        $.alert({
                            title: 'error!',
                            content: 'please provide a valid item!',
                            type:'error',
                            theme:'modern',
                        });
                        return false;
                    }
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                        type: 'POST',
                        url: '/lists/edit/'+header+'/'+id,

                        dataType: 'json',
                        data:{item_value:name},
                        success: function (data) {
                            if(data.success==true)
                            {
                                swal("Done!", "It was succesfully Updated!", "success");
                                $('.'+id+' p').text(name);

                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            swal("Error Update!", "Please try again", "error");
                        }
                    });
                }
            },
            cancel: function () {

            },
        },
        onContentReady: function () {
            // bind to events
            var jc = this;
            this.$content.find('form').on('submit', function (e) {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                    type: 'POST',
                    url: '/lists/edit/'+header+'/'+id,

                    dataType: 'json',
                    data:{item_value:name},
                    success: function (data) {
                        if(data.success==true)
                        {
                            swal("Done!", "It was succesfully deleted!", "success");
                            $('.'+id+' p').text(name);

                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error Update!", "Please try again", "error");
                    }
                });
                e.preventDefault();
                jc.$formSubmit.trigger('click'); // reference the button and click it
            });
        }
    });




});

