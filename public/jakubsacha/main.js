$(document).ready(function(){

    $('.ajaxForm').on('submit', function(e)
    {
        var self = this;
        $.ajax({
            type: "POST",
            url: $("form", self).attr('action'),
            data: $("form", self).serialize(),
            success: function(data)
            {
                $(self).html(data);
            }
        });
        $(".box", self).append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        e.preventDefault();
    });

});