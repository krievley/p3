$(document).ready(function () {
    //Hide div initially.
    $("#symNum").css("display", "none");

    $("#sym").click(function () {

        if ($("#sym").is(":checked")) {
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
        if ($('#camelCase').is(":checked")) {
            $('input[name=letter]').attr('disabled', true);
        }
        else {
            $('input[name=letter]').attr('disabled', false);
        }
    });
});

