function hidden_field() {
    var idHome = [1, 2, 3, 7, 8, 9, 10, 11, 12, 13, 17, 18, 19, 20]
    var idPlatform = [4, 5, 6, 14, 15, 16]
    var selected = $('select[name="category_id"]');
    var field = $('.hidden_field');
    var idSelect = null;

    selected.change(function() {
        idSelect = parseInt($(this).val());
        if (idPlatform.includes(idSelect) && !idHome.includes(idSelect)) {
            field.find('input').attr('disabled', true)
            field.find('select').attr('disabled', true)
            field.addClass('d-none');
        } else {
            field.find('select').removeAttr('disabled');
            field.removeClass('d-none');
        }
    })

    if (idPlatform.includes(idSelect) && !idHome.includes(idSelect)) {
        field.find('input').attr('disabled', true)
        field.find('select').attr('disabled', true)
        field.addClass('d-none');
    } else {
        field.find('select').removeAttr('disabled');
        field.removeClass('d-none');
    }

    var unit = $('select[name="unit"]');
    unit.on('change', function() {
        if ($(this).val() === 'Thỏa thuận') {
            $('input[name="price"]').attr('disabled', true);
        } else {
            $('input[name="price"]').removeAttr('disabled');
        }
    });
}

hidden_field();
