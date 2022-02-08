$('.update-status-news').click(function(){
    var status = 0;
    var id = $(this).data('id');
    if($(this).prop('checked') ? status = 1 : status = 0);
    $.ajax({
        url: window.route('update-status-news'),
        method: 'POST',
        data:{status:status, id:id},
        success:function(data){
            if(data.status === 500){
                alert('Lỗi, thử lại sau!')
            }
        }
    })
})

$('.btn_destroy_news').click(function(e){
    var url = $(this).attr('href');
    e.preventDefault();
    Swal.fire({
      title: 'Xác nhận xóa?',
      text: "Không thể khôi phục!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Xóa'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
      }
    })
})
