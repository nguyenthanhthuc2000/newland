
$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
$('.btn__delete__slider').click(function(){
   var id = $(this).data('id');
    Swal.fire({
      title: 'Xác nhận',
      text: "Xóa hình ảnh này!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok',
      cancelButtonText: 'Đóng'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
           url: window.route('admin.destroy.slider'),
           method: 'POST',
           data: {id:id},
       }).done(function(data) {
        console.log(data.status)
          if(data.status == 200){
               Swal.fire({
                 icon: 'success',
                 title:  'Xóa',
                 text: data.messages +'!'
               });
               window.setTimeout(function(){
                   location.reload();
               },1000);
           }
           else if(data.status == 500){
               Swal.fire({
                 icon: 'error',
                 title:  'Xóa',
                 text: data.messages +'!'
               })
           }
       });
      }
    })
})

$('.update-status-slider').click(function(){
    var status = 0;
    var id = $(this).data('id');
    if($(this).prop('checked') ? status = 1 : status = 0);
    $.ajax({
        url: window.route('admin.update.status.slider'),
        method: 'POST',
        data:{status:status, id:id},
        success:function(data){
            if(data.status === 500){
                alert('Lỗi, thử lại sau!')
            }
        }
    })
})
