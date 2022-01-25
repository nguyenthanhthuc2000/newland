
$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
$('.btn__confirm__article').click(function(){
    Swal.fire({
      title: 'Xác nhận',
      text: "Duyệt bài viết này!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok',
      cancelButtonText: 'Đóng'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
})


$('.btn__unconfirm__article').click(function(){
   var id = $(this).data('id');
 Swal.fire({
   title: 'Lí do từ chối!',
   input: 'text',
   inputAttributes: {
     autocapitalize: 'off'
   },
   showCancelButton: true,
   confirmButtonText: 'Ok',
   cancelButtonText: 'Đóng',
   showLoaderOnConfirm: true,
     preConfirm: (update) => {
        var feedback = $("input:text").val();
         if(feedback == ''){
               Swal.showValidationMessage(
                 `Lỗi: Vui lòng không để trống!`
               )
           }
           else{
                $.ajax({
                   url: window.route('article.unconfirm'),
                   method: 'POST',
                   data: {feedback:feedback, id:id},
               }).done(function(data) {
                console.log(data.status)
                  if(data.status == 200){
                       Swal.fire({
                         icon: 'success',
                         title:  'Cập nhật',
                         text: data.messages +'!'
                       });
                       window.setTimeout(function(){
                           location.reload();
                       },1500);
                   }
                   else if(data.status == 500){
                       Swal.fire({
                         icon: 'error',
                         title:  'Cập nhật thất bại',
                         text: data.messages +'!'
                       })
                   }
               });
           }
     }

    })
})
