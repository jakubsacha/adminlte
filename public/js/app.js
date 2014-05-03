// initialize iCheckbox after ajax calls

$(document).ajaxComplete(function() {
    $("input[type='checkbox'], input[type='radio']").iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal'
    });
});

$('input').on('ifChanged', function(event){
    $(this).trigger('change');
    $('input').iCheck('update');  
});