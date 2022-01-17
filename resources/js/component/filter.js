$('.filter-btn .open').click(function(){
    $('.open').css("display", "none");
    $('.close').css("display", "block");
    $('.filter').css("display", "block");
    $('.search__title').removeClass('d-none');
})

$('.filter-btn .close').click(function(){
    $('.close').css("display", "none");
    $('.open').css("display", "block");
    $('.filter').css("display", "none");
    $('.search__title').addClass('d-none');
})

$(document).ready(function () {
  $(document).click(function () {
     // if($(".navbar-collapse").hasClass("in")){
       $('.navbar-collapse').collapse('hide');
     // }
  });
});
$('.navbar-toggler').click(function(){
    $('.filter-btn .close').click();
})
