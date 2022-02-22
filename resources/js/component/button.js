$('button[type="reset"]').on('click', function() {
    var form = $('button[type="reset"]').closest('form')

    form.find('input').val('');

    form.find('select').children('option[selected="selected"]').each(
        function() {
            $(this).removeAttr('selected');
        }
    );
    if ($(this).hasClass("reload")) {
        window.location.href = window.route('post.article');
    } else {
        window.location.href = window.route('article.index');
    }

    // mark the first option as selected
    if (form.find('select').children("option[disabled]")) {
        form.find('select').children("option[disabled]").attr('selected', 'selected');
    } else {
        form.find('select').children("option:first").attr('selected', 'selected');
    }
})
