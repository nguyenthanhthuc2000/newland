// attention
$('.attention').click(function() {
    var content = $(this).data('msg');
    var id = $(this).data('id');

    Swal.fire({
        title: 'Bài viết của bạn đã bị hủy',
        text: content,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Vào trang chỉnh sửa'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = window.route('post.edit', id);
        }
    })
})
