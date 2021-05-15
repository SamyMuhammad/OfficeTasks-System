//select all checkboxes
$("#select_all").change(function () { //"select all" change
    $(".md-check").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
});

//".checkbox" change
$('.md-check').change(function () {
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if (false == $(this).prop("checked")) { //if this item is unchecked
        $("#select_all").prop('checked', false); //change "select all" checked status to false
    }
    //check "select all" if all checkbox items are checked
    if ($('.md-check:checked').length == $('.md-check').length) {
        $("#select_all").prop('checked', true);
    }
});
//select all checkboxes
$(".select_role").change(function () { //"select all" change
    var parent = $(this).data('parent');
    $('*[data-parent="' + parent + '"]').prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
});

//".checkbox" change
$('.permission-checkbox').change(function () {
    //uncheck "select all", if one of the listed checkbox item is unchecked
    var parent = $(this).data('parent');
    if (false == $(this).prop("checked")) { //if this item is unchecked

        $('.select_role[data-parent="' + parent + '"]').prop('checked', false); //change "select all" checked status to false

        $("#select_all").prop('checked', false); //change "select all" checked status to false
    }

    if ($('.permission-checkbox[data-parent="' + parent + '"]:checked').length == $('.permission-checkbox[data-parent="' + parent + '"]').length) {

        $('.select_role[data-parent="' + parent + '"]').prop('checked', true);
        if ($('.md-check:checked').length == $('.md-check').length) {
            $("#select_all").prop('checked', true);
        }


    }
});