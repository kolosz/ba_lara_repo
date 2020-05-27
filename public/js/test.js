$(document).ready(function(){
    $('#start_btn').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: "{{ route('home.find') }}",
            success: function(result){
                alert("Welcome!");
                console.log(result);
            },
            error: function (result) {
                console.log(result)
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
            success: function(result){
                alert("Thank you! See you soon!");
                console.log(result);
            },
            error: function (result) {
                console.log(result)
            }
        })

    })
});
