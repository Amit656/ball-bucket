$(document).ready(function() {
    // Handle the AJAX request
    $('#submit-bucket-form').click(function(e) {
        e.preventDefault();
        
        var name = $('#bucket-name').val();
        var volume = $('#bucket-volume').val();
        
        $.ajax({
            type: 'POST',
            url: APP_URL + '/api/buckets',
            data: {
                _token: '{{ csrf_token() }}',
                name: name,
                volume: volume
            },
            success: function(response) {
                // Handle the successful response
                console.log(response);
            },
            error: function(response) {
                // Handle the error response
                console.log(response.responseJSON);
            }
        });
    });

    $('#ball-form').click(function(e) {
        e.preventDefault();
        
        var name = $('#ball-name').val();
        var volume = $('#ball-volume').val();
        
        $.ajax({
            type: 'POST',
            url: APP_URL + '/api/balls',
            data: {
                _token: '{{ csrf_token() }}',
                name: name,
                volume: volume
            },
            success: function(response) {
                // Handle the successful response
                console.log(response);
            },
            error: function(response) {
                // Handle the error response
                console.log(response.responseJSON);
            }
        });
    });
});