$('input.input-datalist').on('input', function() {
    let value = $(this).val().toLowerCase();
    let id = $(this).attr('id');
    let datalist = $('.dropdown-menu[datalist=' + id + '] li');
    datalist.filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
})
$('.dropdown-menu').on('click', 'li', function(e) {
    let id = $(this).parents().attr('datalist');
    let input = $('#' + id);
    let value = $(this).text();
    input.val(value).attr('data-id', $(this).attr('value', )).attr('value').trigger("input");
})

