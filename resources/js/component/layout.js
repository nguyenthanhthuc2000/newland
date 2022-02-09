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

$('.btn__send__contact').click(function() {
    var name = $('#frm-contact #name').val();
    var phone = $('#frm-contact #phone').val();
    var email = $('#frm-contact #email').val();
    var content = $('#frm-contact #content').val();
    var article_id = $('#frm-contact #article_id').val();

    if (name == '') {
        $('.name-error').removeClass('d-none');
    } else {
        $('.name-error').addClass('d-none');
    }

    if (phone == '') {
        $('.phone-error').removeClass('d-none');
    } else {
        $('.phone-error').addClass('d-none');
    }

    $.ajax({
        url: window.route('request.contact.store'),
        method: 'POST',
        data: { name: name, phone: phone, email: email, contents: content, article_id: article_id }
    }).done(function(data) {
        $('#contactModal .close').click()
        if (data.status === 200) {
            Swal.fire(
                'Thành công!',
                'Chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất!',
                'success'
            )
        } else {
            Swal.fire(
                'Lỗi!',
                'Vui lòng thử lại sau!',
                'warning'
            )
        }
    });
})

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.btn_follow_website').click(function() {
    let email = $('.input_follow_website').val();
    let emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if (email === '') {
        Swal.fire('Vui lòng nhập địa chỉ email')
    } else if (!emailReg.test(email)) {
        Swal.fire('Không đúng định dạng email')
    } else {
        $.ajax({
            url: window.route('home.follow'),
            method: 'POST',
            data: { email: email },
            success: function(data) {
                if (data.status === 500) {
                    alert('Lỗi, thử lại sau!')
                } else {
                    Swal.fire(
                        'Cảm ơn bạn đã đăng kí nhận tin từ chúng tôi',
                        'Chúng tôi sẽ gửi những tin tức nổi bật đến bạn sớm nhất!',
                        'success'
                    )
                    $('.input_follow_website').val('');
                }
            }
        })
    }
})
