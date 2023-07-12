<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
        <div class="row">
            <div class="col-sm border pb-1">
            <p class="h1">Bucket Form</p>
                <form id="bucket-form" action="#">
                    <div class="mb-3">
                        <label for="bucket-name" class="form-label">Bucket Name</label>
                        <input type="text" class="form-control" id="bucket-name" name="bucker_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="bucket-volume" class="form-label">Bucket volume(In inches)</label>
                        <input type="text" class="form-control" id="bucket-volume" name="bucket_volume" required>
                    </div>
                    <button type="button" class="btn btn-primary" id="submit-bucket-form">Save</button>
                </form>
            </div>
            <div class="col-sm border ms-1 pb-1">
            <p class="h1">Ball Form</p>
                <form id="ball-form" action="#">
                    <div class="mb-3">
                        <label for="ball-name" class="form-label">Ball Name</label>
                        <input type="text" class="form-control" id="ball-name" name="ball_name">
                    </div>
                    <div class="mb-3">
                        <label for="ball-volume" class="form-label">Ball volume(In inches)</label>
                        <input type="text" class="form-control" id="ball-volume" name="ball_volume">
                    </div>
                    <button type="submit" id="ball-form" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-sm border pb-1">
            <p class="h1">Bucket Suggestions</p>
                <form id="ball-form" action="#">
                    <div class="mb-3">
                        <label for="bucket-name" class="form-label">Bucket Name</label>
                        <input type="text" class="form-control" id="bucket-name" name="bucker_name">
                    </div>
                    <div class="mb-3">
                        <label for="bucket-volume" class="form-label">Bucket volume(In inches)</label>
                        <input type="text" class="form-control" name="bucket_volume">
                    </div>
                    <button type="button" class="btn btn-primary">Save</button>
                </form>
            </div>
            <div class="col-sm border pb-1">
            <p class="h1">Result</p>
            <p class="h3">Following are the suggested buckets</p>
                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var APP_URL = '{{url('/')}}';
    </script>
    <script src="{{ asset('js/ajax.js') }}"></script>
    
  </body>
</html>