@extends('layouts.admin')



@section('content')


    @if(Session::has('deleted_user'))


            <p class="alert alert-danger">{{session('deleted_user')}}</p>

    @endif


    <h1>Users</h1>


     <table class="table table-condensed animated fadeInDownBig ">
       <thead>
         <tr>
             <th>ID</th>
             <th>Photo</th>
             <th>Name</th>
             <th>Email</th>
             <th>Role</th>
             <th>Status</th>
             <th>Created</th>
             <th>Updated</th>
           </tr>
         </thead>
       <tbody>


       @if($users)
           @foreach($users as $user)
           <tr>
             <td>{{$user->id}}</td>
             <td><img src="{{$user->photo ? $user->photo->file : '/images/unknown.png'}}" alt="" style="border-radius: 10%;height: 40px;"></td>
             <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
             <td>{{$user->email}}</td>
             <td>{{$user->role? $user->role->name : 'User has no role'}}</td>
             <td>{{$user->is_active? 'Active' : 'Not Active'}}</td>
             <td>{{$user->created_at->diffForHumans()}}</td>
             <td>{{$user->updated_at->diffForHumans()}}</td>
           </tr>
           @endforeach
       @endif
       </tbody>
     </table>
    <div class="row">
    </div>

     <div class="row">
         <div class="col-sm-6 col-sm-offset-5 col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5">
                {!! $users->render() !!}
         </div>
     </div>

@stop