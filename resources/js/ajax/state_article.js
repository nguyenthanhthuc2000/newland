$('select#state').change(function() {

    var state = $(this).val();
    var id = $(this).data('id');

    $.ajax({
        url: window.route('article.update.state'),
        method: 'post',
        data: {
            'state': state,
            'id': id
        }
    }).done(function(data) {
        Swal.fire({
            position: 'center-center',
            icon: data.status,
            title: data.msg,
            showConfirmButton: false,
            timer: 1500
        })
    });
})