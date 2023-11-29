@extends('userLayout')
@section('title') UserDashboard
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

              </tr>
            </thead>
            <tbody>

                @foreach($user as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->email}}</td>
                    <td>{{$list->status}}</td>
                        </tr>
             @endforeach
            </tbody>
          </table>
    </div>
</div>

@endsection
