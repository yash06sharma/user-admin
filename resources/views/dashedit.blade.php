@extends('layout')
@section('title') EditUser
@endsection


@section('body')
<div class="row mt-5">
    <div class="col-sm-12">
        <h5 class="alert alert-danger">Edit Users</h5>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name"  value="{{$user->name}}">
                </div>
              </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email"  value="{{$user->email}}">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" name="password" value="{{$user->password}}">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                        <option if {{ ( $user->status == 'pending' ) ? 'selected' : ''}} value="pending">Pending</option>
                        <option {{ ( $user->status == 'active' ) ? 'selected' : ''}} value="active">Active</option>
                      </select>



                  {{-- <input type="text" class="form-control" id="status" name="status" value="{{$user->status}}"> --}}
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection
