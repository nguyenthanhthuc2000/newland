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
        })
        .catch(error => {
            console.error(error);
        })
}
