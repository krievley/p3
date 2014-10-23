$(document).ready(function () {
    //If symbol checkbox is clicked.
    $("input[type='checkbox'][name='symbol']").click(function () {
        //Check to see if symbol is selected.
        //If yes, display div containing the symbol input field.
        if ($("input[type='checkbox'][name='symbol']").is(":checked")) {
            //show the hidden div
            $("#symNum").show();
        }
        else {
            //otherwise, hide it
            $("#symNum").hide();
        }
    });

    //disable letter choices if "camelCase" is selected.
    $('input[name=separation]').click(function () {
        if ($('input[value="camelCase"]').is(":checked")) {
            $('input[name=letter]').attr('disabled', true);
        }
        else {
            $('input[name=letter]').attr('disabled', false);
        }
    });
});

