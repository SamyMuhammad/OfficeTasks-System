// Adding Panel for the service when it is selected.
$('#services-select2').on('select2:select', function (e) {
    var selectedValue = e.params.data.element.value;
    var selectedText = e.params.data.text;
    var panel = '<div id="service-'+selectedValue+'" class="row">\
                    <div class="panel panel-default">\
                        <div class="panel-heading">\
                            <h2 class="panel-title">'+selectedText+'</h2>\
                        </div>\
                        <div class="panel-body">\
                            <div class="form-group">\
                                <label class="control-label">الوصف</label>\
                                <input type="text" name="'+selectedValue+'|description" class="form-control description" placeholder="ادخل الوصف">\
                            </div>\
                            <div class="form-group">\
                                <label class="control-label">السعر</label>\
                                <input type="number" name="'+selectedValue+'|price" min="1" step="0.1" class="form-control price" placeholder="ادخل السعر">\
                            </div>\
                        </div>\
                    </div>\
                </div>';
    $('#panels-area').append(panel);
});

// Removing the panel of the unselected service.
$('#services-select2').on('select2:unselect', function (e) {
    var selectedValue = e.params.data.element.value;
    var elementId = 'service-'+selectedValue;
    
    $('#'+elementId).remove(); 
    var sum = getSum();
    showTotal(sum);
    computeRemaining();
});

// Counting the total from all the prices.
$(document).on('keyup change', '.price', function (e) {
    var sum = getSum();
    showTotal(sum);
    computeRemaining();
});

$(document).on('keyup change', '#paid', function (e) {
    computeRemaining();
})

function getSum() {
    var sum = 0;
    $('.price').each(function() {
        sum += Number($(this).val());
    });
    return sum;
}

function showTotal(sum) {
    $('#total-heading').html('الإجمالي = '+ sum);
    $('#total-heading').show();
}

function computeRemaining() {
    var sum = getSum();
    var remaining = sum - Number($('#paid').val());
    if (remaining >= 0) {
        $('#remaining-warning').hide();
        $('#remaining').val(remaining);
    }else{
        $('#remaining').val(null);
        $('#remaining-warning').html("المدفوع أكبر من الإجمالي.");
        $('#remaining-warning').show();
    }
}