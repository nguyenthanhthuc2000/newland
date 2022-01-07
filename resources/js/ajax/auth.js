// click đăng kí
$('.btn-register').click(function(e) {
    e.preventDefault();
     var regulation_confirm = $('#regulation_confirm');
     if(regulation_confirm.prop("checked") == false){
        $('.error_regulation_confirm').removeClass('d-none');
     }
     else{
        $('#register_form').submit();
        $('.error_regulation_confirm').addClass('d-none');
     }

})
