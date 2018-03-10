/*login*/

$('#email').focus(function () {
    $(this).removeAttr("placeholder");
   $('.effect-parent-email label').fadeIn();
});
$('#email').focusout(function () {
    $(this).attr("placeholder",'enter email');
   $('.effect-parent-email label').fadeOut();
});

$('#password').focus(function () {
    $(this).removeAttr("placeholder");
    $('.effect-parent-pass label').fadeIn();
});

$('#password').focusout(function () {
    $(this).attr("placeholder",'password');
   $('.effect-parent-pass label').fadeOut();
});

$('#check').click(function () {
   var email=$('#email').val();

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

        type: 'POST',
        url: '/checkEmail',

        dataType: 'json',
        data: {email: email},

        success: function (data) {

            if (data.success === true) {

                $('.effect-parent-pass').fadeIn();
                $('.effect-parent-email').hide();
                $('.form-main h3').html('Welcome');
                $('#check').hide();
                $('#send').show();
                $('#email').val(data.user['email']);
                $('.form-main .user_name').html(data.user['name']);




            }
            else
            {
                $('#email').addClass('invalid');
                $('#emailHelp').addClass('invalid-text');
                $('#emailHelp').html('this email is not exist !!');
                $('#email').val('');

            }
        }
});
});