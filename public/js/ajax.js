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

    $('#ball-form-submit').click(function(e) {
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
                // console.log(response);

                $.ajax({
                    type: 'GET',
                    url: APP_URL + '/api/balls',
                    success: function(response) {
                        // Handle the successful response
                        // console.log(response);
                        // Handle the error response
                        let html = '';
                        // console.log(response.length);
                        if(response.length > 0){
                            console.log('here');
                            $.each(response, function(index, data) {
                                console.log(data);
                                    html += `<div class="mb-3">
                                    <label for="${data.id}" class="form-label">${data.name}</label>
                                    <input type="text" data="${data.id}" class="form-control" id="${data.name}" name="balls[${data.id}]">
                                    </div>`;
                              });

                            

                            console.log(html);

                            $('#bucket-suggestions').html(html);
                        }
                    },
                    error: function(response) {
                        
                    }
                });
            },
            error: function(response) {
                // Handle the error response
                console.log(response.responseJSON);
            }
        });
    });

    $('#submit-bucket-suggestions').click(function(e) {
        e.preventDefault();
        
        var array = [];
        let data = $("input[name='balls[]']").map(function(){
            return {'id': $(this).attr('data'), 'value': $(this).val()};
        }).get();
        
        $.ajax({
            type: 'POST',
            url: APP_URL + '/api/suggest-buckets',
            data: {
                _token: '{{ csrf_token() }}',
                balls:data
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