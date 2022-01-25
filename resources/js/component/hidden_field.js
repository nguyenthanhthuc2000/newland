function hidden_field() {
    var idHome = [1, 2, 3, 7, 8, 9, 10, 11, 12, 13, 17, 18, 19, 20]
    var idPlatform = [4, 5, 6, 14, 15, 16]
    var selected = $('select[name="category_id"]');
    var field = $('.hidden_field');

    selected.change(function() {
        var idSelect = parseInt($(this).val());
        if (idPlatform.includes(idSelect) && !idHome.includes(idSelect)) {
            field.find('input').attr('disabled', true)
            field.find('select').attr('disabled', true)
            field.addClass('d-none');
        } else {
            field.find('select').removeAttr('disabled');
            field.removeClass('d-none');
        }
    })

}

hidden_field();