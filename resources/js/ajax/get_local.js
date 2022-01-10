$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// lấy danh sách tỉnh, thành phố
var getDistrict = function(province) {
        $.ajax({
            url: window.route('get.districts'),
            method: 'post',
            data: {
                '_province_id': province
            }
        }).done(function(data) {
            appendLocal('districts', data, 'Quận / Huyện');
        });
    }
    // lấy danh sách phường xã
var getWard = function(district) {
        var _province_id = $('.input-datalist').data('id');
        $.ajax({
            url: window.route('get.wards'),
            method: 'post',
            data: {
                '_district_id': district,
                '_province_id': _province_id
            }
        }).done(function(data) {
            appendLocal('wards', data, 'Phường / Xã');
        });
    }
    // lấy danh sách đường
var getStreet = function(ward) {
    var _province_id = $('.input-datalist').data('id');
    $.ajax({
        url: window.route('get.streets'),
        method: 'post',
        data: {
            '_district_id': ward,
            '_province_id': _province_id
        }
    }).done(function(data) {
        appendLocal('streets', data, 'đường');
    });
}
var appendLocal = function(type, data, placeholder = 'Chọn') {
    var list = $('.select-local[data-type=' + type + ']');
    // console.log('.select-local[data-type=' + type + ']');
    var output = `<option disable="" hidden>${ placeholder }</option>`;
    $.each(data, function(key, val) {
        output += `<option value="` + val.id + `">` + val._prefix + ` ` + val._name + `</option>`
    })
    list.html(output)
}
var resetLocal = function() {
    $('.input-datalist').val('').removeAttr('data-id');
}
$('.select-local').on('change', function(e) {
    var parents = $(this);
    //    var parentOfParent = parents.parents().className;
    // console.log(parentOfParent);
    let type = parents.data('type');
    var id = $(this).val();
    // console.log(type, id);
    switch (type) {
        case 'wards':
            // getStreet(id)
            break;
        case 'districts':
            getWard(id)
            break;
        case 'provinces':
            getDistrict(id);
            resetLocal();
            break;
        default:
            return false;
    }
})