$(document).ready(function(){

    $('#start-btn').click(function (e) {
        e.preventDefault();

        console.log("1");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        console.log("2");

        $.ajax({
            type: 'post',
            url: "/home",
            data: { start_btn: "start_btn"},
            success: function(result){
                console.log(result.responseText);
                alert("Welcome!");
                $("#start-lbl").text("You start working at: " + new Date($.now()));
                $('#start_btn').prop('disabled', true);
                $('#stop-btn').prop('disabled', false);
            },
            error: function (result) {
                console.log(result.responseText);
                $("#start-lbl").text("An error occurred. Please contact your local IT.");
            }
        })
    });

    $('#stop-btn').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: "/home",
            data: { stop_btn: "stop-btn"},
            success: function(result){
                console.log(result.responseText);
                alert("Bye. See you soon.");
                $("#stop-lbl").text("You stopped working at: " + new Date($.now()));
                $("#start-lbl").text("You are done for today. Great job!");
                $('#start_btn').prop('disabled', false);
                $('#stop-btn').prop('disabled', true);

            },
            error: function (result) {
                console.log(result.responseText);
                $("#stop-lbl").text("An error occurred. Please contact your local IT.");
            }
        })

    });

    $('#pause-btn').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: "/home",
            data: { pause_btn: "pause-btn"},
            success: function (result) {

            },
            error: function (result) {

            }
        })

    })
});
