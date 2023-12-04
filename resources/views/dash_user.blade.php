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

             @foreach($preuser as $list)
             <tr>
                 <td>{{$list->id}}</td>
                 <td>{{$list->name}}</td>
                 <td>{{$list->email}}</td>
                 <td>{{$list->status}}</td>
                 <td>
                     <a href="{{url ('/admin-dashboard/editpreuser', $list->id)}}" class="btn btn-secondary">Edit</a>&nbsp;&nbsp;
                     <a href="{{url ('/admin-dashboard/deleted', $list->id)}}" class="btn btn-warning">Delete</a>&nbsp;&nbsp;
                 </td>
                     </tr>
          @endforeach
            </tbody>
          </table>
    </div>
</div>




{{-- <a class="btn btn-warning" href="{{$list->status}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete</a>
         <!-- Modal -->
         <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Window</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Name:- {{$list->name}}</p>
                    <p>Email:- {{$list->email}}</p>
                    Are you sure to delete this contect?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{url ('/admin-dashboard/delete', $list->id)}}"  class="btn btn-primary">Delete</a>
                </div>
            </div>
            </div>
        </div> --}}

@endsection



{{-- <a href="{{url ('/admin-dashboard/delete', $list->id)}}" class="btn btn-warning">Delete</a>&nbsp;&nbsp; --}}
