$('.filter-btn').click(function() {
    if ($('.navbar-collapse').hasClass('show')) {
        $('.navbar-toggler').click();
    }
    $('.filter').toggleClass('open')
    $('.search__title').toggleClass('d-none');
})

$("body").click(function(e) {
    if ($('.filter').hasClass('open')) {
        $('.filter').toggleClass('open')
    } else {
        e.stopPropagation();
    }
});

$(".filter").click(function(e) {
    e.stopPropagation();
});

$('.navbar-toggler').click(function(e) {
    if ($('.filter').hasClass('open')) {
        $('.filter-btn').click();
    } else {
        e.stopPropagation();
    }
})
$(".filter-btn").click(function(e) {
    e.stopPropagation();
});
