var uploadImages = function() {
    var input = $('.input-gallery');
    var boxInput = $('.box-upload');
    var boxReview = $('.review-image-upload');
    const dt = new DataTransfer();

    boxInput.click(function() {
        input.click();
    })

    input.on('change', function() {
        imagesPreview(this, boxReview);

        // thêm data vào dataTransfer
        for (let file of this.files) {
            dt.items.add(file);
        }

        this.files = dt.files;

        boxReview.on('click', '.destroy', function() {
            let name = $(this).next('span.name').text();

            // $(this).closest('.col').remove();
            // for (let i = 0; i < dt.items.length; i++) {
            //     // Khớp tệp và tên
            //     if (name === dt.items[i].getAsFile().name) {
            //         // Xóa tệp trong đối tượng DataTransfer
            //         dt.items.remove(i);
            //         continue;
            //     }
            // }
            //Cập nhật các tệp tin đầu vào sau khi xóa
            // input.files = dt.files;
        });
    });

    // boxReview.on('click', '.destroy', function(e) {
    //     // $(this).closest('.col').remove();
    //     var index = $(this).data('index');
    //     var files = $('.input-gallery')[0].files;

    //     console.log(Array.from(files))
    //     var newList = Array.from(files);
    //     newList.splice(index);
    // })

    boxReview.on('click', '.rotate', function() {
        var _this = $(this).parent().prev();
        var pos = getRotationDegrees(_this);

        _this.css('transform', 'rotate(' + (pos + 90) + 'deg)');
        if ((pos + 90) == 0) {
            _this.removeAttr('style');
        }
    })

    // lấy góc hiện tại
    function getRotationDegrees(obj) {
        var matrix = obj.css("-webkit-transform") ||
            obj.css("-moz-transform") ||
            obj.css("-ms-transform") ||
            obj.css("-o-transform") ||
            obj.css("transform");
        if (matrix !== 'none') {
            var values = matrix.split('(')[1].split(')')[0].split(',');
            var a = values[0];
            var b = values[1];
            var angle = Math.round(Math.atan2(b, a) * (180 / Math.PI));
        } else { var angle = 0; }
        //return (angle < 0) ? angle + 360 : angle;
        return angle;
    }

    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;
            // console.log(input.files);
            for (let i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                var output = boxReview.html(); // lấy danh sách trong box
                var index = boxReview.children().length > 0 ? boxReview.children().length : 0;
                // var output = ''; // lấy danh sách trong box
                reader.onload = function(event) {
                    output += `<div class="col">
                        <div class="card">
                            <div class="card-img">
                                <img src="${ event.target.result }" class="card-img-top" alt="...">
                                <div class="actions">
                                    <i class="fas fa-undo rotate mr-3" title="Xoay"></i>
                                    <i class="far fa-window-close destroy" title="Xóa" data-index="${index}"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Nhập mô tả" name="description_img[]">
                            </div>
                        </div>
                    </div>`

                    $(placeToInsertImagePreview).html(output);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

}
uploadImages();
