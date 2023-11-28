<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h5 class="alert alert-warning"> Wellcome to DataFunShow</h5>
        </div>
    </div>

    <div class="shadow p-3 mb-5 bg-body-tertiary rounded">

    <div class="row">
        <div class="col-sm-12">
            Hy, {{$email}}
            <p>We wellcome you to be part of our institution</p>
            <p>Best Regard</p>
            <p>Team Yash</p>
            <a href="{{url ('/user-reg')}}">go To Website</a>
        </div>
    </div>
</div>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
