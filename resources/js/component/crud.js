$('.btn-destroy').click(function() {
    var href = $(this).data('href');

    Swal.fire({
        title: 'Bạn có muốn xóa?',
        text: "Sau khi xóa không thể phục hồi!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = href;
        }
    })
})