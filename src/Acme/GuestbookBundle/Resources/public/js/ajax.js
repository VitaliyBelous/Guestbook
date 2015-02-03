$(document).ready(function() {
    var $form = $('#myForm');
    $form.submit(function(e) {
        e.preventDefault();
        var data = $form.serialize();
        data += '&isAjax=1';
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: data,
            dataType: 'json',
            success:
            function(data) {
                var $messageTable = $('#message');
                var $commentsContainer = $('.content');
                $form[0].reset();
                $(data['data']).appendTo($commentsContainer);
                $(data['message']).appendTo($messageTable);
            }
        });

    });
});

