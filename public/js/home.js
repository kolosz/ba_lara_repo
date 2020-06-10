$(document).ready(function(){

    $('#end-pause').hide();

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
            type: "post",
            url: "/home",
            data: { start_btn: "start_btn"},
            success: function(result){
                console.log(result);
                console.log(result.responseText);
                alert("Welcome!");
                $("#start-lbl").text("You start working at: " + new Date($.now()));
                // hide and seek
                $('#start-btn').prop('disabled', true);
                $('#stop-btn').prop('disabled', false);
                $('#start-pause-btn').prop('disabled', false);
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
            type: "post",
            url: "/home",
            data: { stop_btn: "stop-btn"},
            success: function(result){
                console.log(result);
                console.log(result.responseText);

                alert("Bye. See you soon.");
                $("#stop-lbl").text("You stopped working at: " + new Date($.now()));
                // hide and seek
                $("#start-lbl").text("You are done for today. Great job!");
                $('#start-btn').prop('disabled', false);
                $('#stop-btn').prop('disabled', true);
                $('#start-pause-btn').prop('disabled', true);
                $('#end-pause-btn').prop('disabled', true);
            },
            error: function (result) {
                console.log(result.responseText);
                $("#stop-lbl").text("An error occurred. Please contact your local IT.");
            }
        })

    });

    $('#start-pause-btn').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "/home",
            data: { start_pause_btn: "start-pause-btn" },
            success: function (result) {
                console.log(result);

                alert("Enjoy your break!");
                // <p>
                $("#end-pause-lbl").text("You started your break at: " + new Date($.now()));
                // hide and seek
                $('#end-pause').show();
                $('#start-pause').hide();
                $('#end-pause-btn').prop('disabled', false);
                $('#stop-btn').prop('disabled', true);
            },
            error: function (result) {
                alert("error");
            }
        })

    })

    $('#end-pause-btn').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "/home",
            data: { end_pause_btn: "end-pause-btn" },
            success: function (result) {
                console.log(result);

                alert("Welcome to the 2nd half!");
                // <p>
                $("#start-pause-lbl").text("You ended your break at: " + new Date($.now()));
                // hide and seek
                $('#start-pause').show();
                $('#end-pause').hide();
                $('#stop-btn').prop('disabled', false);
            },
            error: function (result) {
                alert("error");
            }
        })

    })

    $('#calculate-btn').click(function(e) {
        e.preventDefault();

        console.log("flag 1");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        console.log("flag 2");

        $.ajax({
            type: "post",
            url: "/home",
            data: { calculate_btn: "calculate-btn" },
            success: function (result) {
                console.log(result);
                console.log("worked");
            },
            error: function (result) {
                alert("error");
            }
        })

    })
});
