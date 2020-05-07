jQuery(document).ready(function(){
    jQuery('#start-btn').on('submit', (function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: "{{ url('/home') }}",
            method: 'post',
            success: function(result){
                jQuery('.alert').show();
                jQuery('.alert').html(result.success);
            }});
    }));

    jQuery('#stop-btn').on('submit', (function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: "{{ url('/home') }}",
            method: 'post',
            success: function(result){
                jQuery('.alert').show();
                jQuery('.alert').html(result.success);
            }});
    }));

    jQuery('#pause-btn').on('submit', (function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: "{{ url('/home') }}",
            method: 'post',
            success: function(result){
                jQuery('.alert').show();
                jQuery('.alert').html(result.success);
            }});
    }));

    function startPause() {
        // do start
        $('#pause-btn').click(endPause);
    }

    function endPause() {
        // do end
        $('#pause-btn').click(startPause);
    }

});
