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
        appendLocal('districts', data);
    });
}
// lấy danh sách phường xã
var getWard = function(ward) {
    $.ajax({
        url: window.route('get.wards'),
        method: 'post',
        data: {
            '_province_id': province
        }
    }).done(function(data) {
        appendLocal('wards', data);
    });
}
// lấy danh sách đường
var getStreet = function(street) {
    $.ajax({
        url: window.route('get.streets'),
        method: 'post',
        data: {
            '_province_id': street
        }
    }).done(function(data) {
        appendLocal('streets', data);
    });
}
var appendLocal = function(type, data) {
    var list = $('.dropdown-menu[data-type=' + type + ']');
    var output = '';
    $.each(data, function(key, val) {
        output += `<li value="` + val.id + `">` + val._prefix + ` ` + val._name + `</li>`
    })
    list.html(output)
}

$('.dropdown-menu').on('click', 'li', function(e) {
    let type = $(this).parents().data('type');
    var id = $(this).val();
    console.log(id);
    switch (type) {
        // case 'streets':
        //         getDistrict(id)
        //     break;
        case 'wards':
            getStreet(id)
            break;
        case 'districts':
            getWard(id)
            break;
        case 'province':
            getDistrict(id)
            break;
        default:
            return false;
    }
})