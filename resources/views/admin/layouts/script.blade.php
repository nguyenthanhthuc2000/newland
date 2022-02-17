
<script src="{{ asset('administrator/js/app.js') }}"></script>
<script src="{{ asset('administrator/ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">
    CKEDITOR.replace('ck_news',{
      filebrowserImageUploadUrl : "{{ url('admin/upload-manager/uploads-ckeditor?_token='.csrf_token()) }}",
      filebrowserBrowseUrl : "{{ url('admin/upload-manager/file/file-browser?_token='.csrf_token()) }}",
      filebrowserUploadMethod : 'form'
    });
    CKEDITOR.config.entities = false; //khong bi loi font k insert
</script>
