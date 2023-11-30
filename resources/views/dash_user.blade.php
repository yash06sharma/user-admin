@extends('layout')
@section('title') UserList
@endsection


@section('body')
<div class="row">
    <div class="col-sm-12 mt-5">
        <h5 class="alert alert-danger">Active User List</h5>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>

                @foreach($user as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->email}}</td>
                    <td>{{$list->status}}</td>
                    <td>
                        <a href="{{url ('/admin-dashboard/edituser', $list->id)}}" class="btn btn-secondary">Edit</a>&nbsp;&nbsp;
                        <a href="{{url ('/admin-dashboard/delete', $list->id)}}" class="btn btn-warning">Delete</a>&nbsp;&nbsp;
                    </td>
                        </tr>
             @endforeach
            </tbody>
          </table>
    </div>
</div>

@endsection
