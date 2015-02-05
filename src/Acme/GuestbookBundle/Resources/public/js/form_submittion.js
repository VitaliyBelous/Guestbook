$(document).ready(function() {

    $('input:submit').click(function () {

        $('p').text("Form submiting.....").addClass('submit');
        $('input:submit').attr("disabled", true);
        location.reload();
    });

    $('button').click(function () {
        $('p').text("I'm a form ~").removeClass('submit');
        $('input:submit').attr("disabled", false);
    });

});