var category = function(type) {
    $.ajax({
        url: window.route('get.category'),
        method: 'post',
        data: {
            'type': type
        }
    }).done(function(data) {
        var output = '<option selected disable>Loại bất động sản</option>';
        if(data){
            output += data;
            $('#typeOfRealEstate').html(output);
        }    
    });
}

$('.type-post-input').on('click', function() {
    var type = $(this).data('type');
    category(type);
})
