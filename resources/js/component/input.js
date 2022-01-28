// CREATE UNIT ON INPUT
$('input').attr('unit', function() {
    if ($(this).attr('unit')) {
        var unit = $(this).attr('unit');
        var unitContainer = `<span style="position:absolute;top:50%;transform:translateY(-50%);right: 10px;">` + unit + `</span>`;
        $(this).parent().css('position', 'relative');
        $(this).attr('style', 'padding-right: 40px !important');
        $(this).after(unitContainer);
    }
});

// CHECK NUMBER WHEN TYPE
$('input[type=number]').on('keypress', function(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if (charCode < 48 || charCode > 57) {
        return false;
    } else {
        return true;
    }
})

// INPUT STEP
function inputStep() {
    var name = '';
    let btnStep = $('.btn-step');
    let inputStep = $('.input-step');

    inputStep.each(function(k, v) {
        if ($(this).val() == 0) {
            name = $(this).attr('name');
            $(".btn-step[data-type='minus'][data-field='" + name + "']").attr('disabled', 'true');
        }
    })

    btnStep.click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).data('type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {
                input.val(currentVal - 1).change();

            } else if (type == 'plus') {
                input.val(currentVal + 1).change();
            }
        } else {
            input.val(0);
        }
    });

    inputStep.change(function() {

        minValue = parseInt($(this).attr('min'));

        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent <= minValue) {
            $(".btn-step[data-type='minus'][data-field='" + name + "']").attr('disabled', 'true');
            $(this).val(0);
        }
        if (valueCurrent > minValue) {
            $(".btn-step[data-type='minus'][data-field='" + name + "']").removeAttr('disabled');
        }
    });
    inputStep.keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
}
inputStep();

// APPEND THE ADDRESS ON THE POST

function appendAddressOnPost() {
    var p = $('select[name="province_id"]');
    var d = $('select[name="district_id"]');
    var w = $('select[name="ward_id"]');
    var s = $('input[name="street_id"]');

    var r = $('input[name="address_on_post"]');


    p.on('change', function() {
        appendTo(r)
    });
    d.on('change', function() {
        appendTo(r)
    });
    w.on('change', function() {
        appendTo(r)
    });
    s.on('input', function() {
        appendTo(r)
    });

    function appendTo(to) {
        var tp = p.find("option:selected:not([disabled])").text() ? p.find("option:selected:not([disabled])").text() : '';
        var td = d.find("option:selected:not([disabled])").text() ? d.find("option:selected:not([disabled])").text() + ', ' : '';
        var tw = w.find("option:selected:not([disabled])").text() ? w.find("option:selected:not([disabled])").text() + ', ' : '';
        var ts = s.val() ? s.val() + ', ' : '';
        var t = ts + tw + td + tp;
        to.val(t)
    }
}
appendAddressOnPost()
$('#input_file_img').change(function() {
    var img = document.getElementById('review-img');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.onload = function(){
        URL.revokeObjectURL(img.src);
    }
})

$(document).ready(function(){
    $('#review-img').click(function(){
        $('#input_file_img').click();
    })
})
