var uploadImages = function() {
    var input = $('.input-gallery');
    var boxInput = $('.box-upload');
    var boxReview = $('.review-image-upload');

    boxInput.click(function() {
        input.click();
    })

    input.on('change', function() {
        imagesPreview(this, boxReview);
    });

    boxReview.on('click', '.destroy', function() {
        $(this).closest('.col').remove();
    })

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
            // var output = '';
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                var output = boxReview.html(); // lấy danh sách trong box
                reader.onload = function(event) {
                    output += `<div class="col">
                        <div class="card">
                            <div class="card-img">
                                <img src="${ event.target.result }" class="card-img-top" alt="...">
                                <div class="actions">
                                    <i class="fas fa-undo rotate mr-3" title="Xoay"></i>
                                    <i class="far fa-window-close destroy" title=""Xóa></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Nhập mô tả">
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
