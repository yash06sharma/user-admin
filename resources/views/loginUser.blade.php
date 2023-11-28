<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <h3 class="alert alert-primary text-center">Wellcome to FunsShap.com</h3>
        </div>
    </div>

    {{--  <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="row text-center">
            <div class="col-sm-6">
               <form action="">
                <h4>Admin Login</h4>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="staticEmail" value="">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Login</button> &nbsp;&nbsp;
                  <a href="{{ url('/reg') }}">Create an Account?</a>
               </form>
            </div>

        </div>
    </div>  --}}
    {{--  now user section  --}}

    <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="row text-center">
            <div class="col-sm-6">
               <form action="" method="POST">
                @csrf
                <h4>User Login</h4>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                  </div>
                  <button type="submit" class="btn btn-info">Login</button> &nbsp;&nbsp;<a href="{{ url('/user-reg') }}">Create an Account?</a>
               </form>
            </div>

        </div>
    </div>


</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
