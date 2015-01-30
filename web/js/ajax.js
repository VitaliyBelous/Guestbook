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
                var $table = $('#message');
                //$table.empty();
                if(data) {
                    //var $row = '<tr><th>' + 'Studio&nbsp;name' +
                    //    '</th><th>' + 'Full&nbsp;name' +
                    //    '</th><th>' + 'Films&nbsp;count' +
                    //    '</th></tr>';
                    //$($row).appendTo($table);
                    $(data).each(function() {
                        $($table).html('Please!');

                        //var $result = '<tr><td>' +
                        //    this['author'] + '</td><td>' +
                        //    this['dueDate'] + '</td><td>' +
                        //    this['site'] + '</td></tr>'+
                        //    this['comment'] + '</td></tr>'+
                        //    this['point'] + '</td></tr>';
                        //$($result).appendTo($table);
                    });
                } else {
                    $($table).html('Please&sbquo;&nbsp;select studio');
                }
            }
        });

    })
});

