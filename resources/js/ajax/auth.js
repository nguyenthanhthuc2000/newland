$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// click đăng kí
$('.btn-register').click(function(e) {
     var email_register = $('#email_register').val();
     var password_register = $('#password_register').val();
     var password_confirm_register = $('#password_confirm_register').val();
     var phone_register = $('#phone_register').val();
     var name_register = $('#name_register').val();
     var birthday_register = $('#birthday_register').val();
     var province_register = $('#province_register').val();
     var district_register = $('#district_register').val();
     var ward_register = $('#ward_register').val();
     var card_id = $('#card_id').val();
     var sex = $('input[name=sex]:checked').val();
     var regulation_confirm = $('#regulation_confirm');
     if(email_register == ''){
        $('.error_email_register').removeClass('d-none');
     }
     else{
        $('.error_email_register').addClass('d-none');
     }

     if(password_register == ''){
        $('.error_password_register').removeClass('d-none');
     }
     else{
        $('.error_password_register').addClass('d-none');
     }

     if(password_confirm_register == ''){
        $('.error_password_confirm_register').removeClass('d-none');
     }
     else{
        $('.error_password_confirm_register').addClass('d-none');
     }

     if(phone_register == ''){
        $('.error_phone_register').removeClass('d-none');
     }
     else{
        $('.error_phone_register').addClass('d-none');
     }

     if(birthday_register == ''){
        $('.error_birthday_register').removeClass('d-none');
     }
     else{
        $('.error_birthday_register').addClass('d-none');
     }

     if(name_register == ''){
        $('.error_name_register').removeClass('d-none');
     }
     else{
        $('.error_name_register').addClass('d-none');
     }

     if(ward_register == ''){
        $('.error_ward_register').removeClass('d-none');
     }
     else{
        $('.error_ward_register').addClass('d-none');
     }

     if(province_register == ''){
        $('.error_province_register').removeClass('d-none');
     }
     else{
        $('.error_province_register').addClass('d-none');
     }

     if(district_register == ''){
        $('.error_district_register').removeClass('d-none');
     }
     else{
        $('.error_district_register').addClass('d-none');
     }

     if(card_id == ''){
        $('.error_card_id').removeClass('d-none');
     }
     else{
        $('.error_card_id').addClass('d-none');
     }

     if(regulation_confirm.prop("checked") == false){
        $('.error_regulation_confirm').removeClass('d-none');
     }
     else{
        $('.error_regulation_confirm').addClass('d-none');
     }
     if(password_confirm_register != '' && password_confirm_register !== password_register){
        $('.error_password_confirm').removeClass('d-none');
     }
     else{
        $('.error_password_confirm').addClass('d-none');
     }

      if(email_register != '' && phone_register != '' &&  password_register != '' && password_confirm_register != '' && name_register != '' &&
         name_register != '' && birthday_register != '' && province_register != '' && district_register != '' &&
          ward_register != '' && card_id != '' && regulation_confirm.prop("checked") == true
      ){
        $.ajax({
            url: window.route('auth.post.register'),
            method: 'POST',
            data: {email:email_register, password:password_register, password_confirm:password_confirm_register, name:name_register
             ,birthday:birthday_register, province:province_register, phone:phone_register
             , district:district_register, ward:ward_register, card:card_id, sex:sex},
            success:function(data){
                console.log(data)
            }
        })

      }


})
