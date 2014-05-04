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

var showStatusMessage = function(message, type)
{
    $('.status-message').remove();
    $('.label-danger').remove();
    
    var html = '<div class="row status-message">\n\
                        <div class="col-lg-12">\n\
                            <div class="alert alert-'+type+'">\n\
                                '+message+'\n\
                            </div>\n\
                        </div>\n\
                </div>';
            
    $(html).prependTo('.right-side .content').hide().fadeIn(900);
};