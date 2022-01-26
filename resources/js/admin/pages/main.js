
function isNumberKey(event){
    var charCode =(event.which) ? event.which : event.keyCode
    if(charCode >31 &&(charCode <48 || charCode >57))
        return false;
    return true;
}


$('#input_file_img').change(function() {
    var img = document.getElementById('review-img');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.onload = function(){
        URL.revokeObjectURL(img.src);
    }
})

$(document).ready(function(){
    $('#review-img').click(function(){
        $('#input_file_img').click();
    })
})

$('#input_file_img_footer').change(function() {
    var img = document.getElementById('review-img-footer');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.onload = function(){
        URL.revokeObjectURL(img.src);
    }
})

$(document).ready(function(){
    $('#review-img-footer').click(function(){
        $('#input_file_img_footer').click();
    })
})
