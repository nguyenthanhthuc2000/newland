$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    arrows: false,
});


$('#phone_contact').click(function() {
    /* Get the text field */
    var copyText = $(this).val();

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText);
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: 'Đã sao chép: ' + copyText
    })
})

$('.btn__send__contact').click(function(){
    var name = $('#frm-contact #name').val();
    var phone = $('#frm-contact #phone').val();
    var email = $('#frm-contact #email').val();
    var content = $('#frm-contact #content').val();
    var article_id = $('#frm-contact #article_id').val();

    if(name == ''){
        $('.name-error').removeClass('d-none');
    }
    else{
        $('.name-error').addClass('d-none');
    }

    if(phone == ''){
        $('.phone-error').removeClass('d-none');
    }
    else{
        $('.phone-error').addClass('d-none');
    }

    $.ajax({
        url: window.route('request.contact.store'),
        method: 'POST',
        data: {name:name, phone:phone, email:email, contents:content, article_id:article_id}
    }).done(function(data) {
       $('#contactModal .close').click()
        if(data.status === 200){
            Swal.fire(
              'Thành công!',
              'Chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất!',
              'success'
            )
        }
        else{
            Swal.fire(
              'Lỗi!',
              'Vui lòng thử lại sau!',
              'warning'
            )
        }
    });
})
