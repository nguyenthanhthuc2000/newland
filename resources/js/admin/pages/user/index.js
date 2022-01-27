$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
$('.update-status').click(function(){
    var status = 0;
    var id = $(this).data('id');
    if($(this).prop('checked') ? status = 1 : status = 0);
    $.ajax({
        url: window.route('admin.update.status'),
        method: 'POST',
        data:{status:status, id:id},
        success:function(data){
            if(data.status === 500){
                alert('Lỗi, thử lại sau!')
            }
        }
    })
})
