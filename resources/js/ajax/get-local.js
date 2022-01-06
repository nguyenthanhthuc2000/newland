$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// lấy danh sách tỉnh, thành phố
var getDistrict = function(province, listId) {
        $.ajax({
            url: window.route('get.districts'),
            method: 'post',
            data: {
                '_province_id': province
            }
        }).done(function(data) {
            appendLocal('districts', data, listId);
        });
    }
    // lấy danh sách phường xã
var getWard = function(district, listId) {
        var _province_id = $('.input-datalist').data('id');
        $.ajax({
            url: window.route('get.wards'),
            method: 'post',
            data: {
                '_district_id': district,
                '_province_id': _province_id
            }
        }).done(function(data) {
            appendLocal('wards', data, listId);
        });
    }
    // lấy danh sách đường
var getStreet = function(ward, listId) {
    var _province_id = $('.input-datalist').data('id');
    $.ajax({
        url: window.route('get.streets'),
        method: 'post',
        data: {
            '_district_id': ward,
            '_province_id': _province_id
        }
    }).done(function(data) {
        appendLocal('streets', data, listId);
    });
}
var appendLocal = function(type, data, listId) {
    var list = $('.dropdown-menu[data-type=' + type + ']');
    var output = '';
    $.each(data, function(key, val) {
        output += `<li value="` + val.id + `">` + val._prefix + ` ` + val._name + `</li>`
    })
    list.html(output)
}
var resetLocal = function() {
    $('.input-datalist').val('').removeAttr('data-id');
}
$('.dropdown-menu').on('click', 'li', function(e) {
    var parents = $(this).parents();
    var parentOfParent = parents.parents().className;
    // console.log(parentOfParent);
    let type = parents.data('type');
    var id = $(this).val();
    switch (type) {
        case 'wards':
            getStreet(id)
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