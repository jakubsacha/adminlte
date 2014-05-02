// initialize iCheckbox after ajax calls

$(document).ajaxComplete(function() {
    $("input[type='checkbox'], input[type='radio']").iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal'
    });
});