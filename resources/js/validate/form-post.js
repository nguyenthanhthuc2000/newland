(function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation');
    var customField = document.querySelectorAll('.needs-validation [unit]');

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    customField.forEach(function(field) {
        field.style.backgroundPosition = 'right calc(0.375em + 0.1875rem + 1.5rem) center'
    })
})()

$('#formPost').on('submit', function(event) {
    // FOR TAGS INPUT
    var tagInput = $(this).find('.bootstrap-tagsinput');
    var tag = tagInput.find('.tag');

    if (tag.length == 0) {
        event.preventDefault()
        event.stopPropagation()
        tagInput.removeClass('is-valid').addClass('is-invalid');
    } else {
        tagInput.removeClass('is-invalid').addClass('is-valid');
    }

    $('.bootstrap-tagsinput input').on('input', function(event) {
        if ($(this).parent().find('.tag').length == 0) {
            $(this).parent().addClass('is-invalid');
        }
        if ($(this).parent().hasClass('is-invalid') === true) {
            $(this).parent().removeClass('is-invalid').addClass('is-valid');
        }
    });

    // FOR CKEditor
    var contentBoxCK = $('.ck-editor');
    var textareaCK = contentBoxCK.prev('textarea').val().trim();

    if (textareaCK == '') {
        contentBoxCK.removeClass('is-valid').addClass('is-invalid');
    } else {
        contentBoxCK.removeClass('is-invalid').addClass('is-valid');
    }

});
