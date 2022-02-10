if ($(".ck-editor").length > 0) {
    ClassicEditor
        .create(document.querySelector('.ck-editor'), {
            toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],

        })
        .then(editor => {
            // console.log(editor);
            editor.editing.view.change(writer => {
                writer.setStyle('min-height', '150px', editor.editing.view.document.getRoot());
            })

            editor.model.document.on('change', (a, b, c) => {
                var contentBoxCK = $('#formPost .ck-editor');
                var data = editor.getData();

                if (contentBoxCK.hasClass('is-invalid')) {
                    contentBoxCK.removeClass('is-invalid').addClass('is-valid');
                }
                if (data == '') {
                    contentBoxCK.removeClass('is-valid').addClass('is-invalid');
                }
            });

        })
        .catch(error => {
            console.error(error);
        })
}
