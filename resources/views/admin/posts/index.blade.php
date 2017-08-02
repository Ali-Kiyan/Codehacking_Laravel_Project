@extends('layouts.admin')




@section('content')


    <h1>Posts</h1>

    @if(Session::has('deleted_post'))


        <p class="alert alert-danger">{{session('deleted_user')}}</p>

    @endif

    <table class="table table-condensed">
      <thead>
        <tr>
               <th>Id</th>
               <th>Photo</th>
               <th>Owner</th>
               <th>Category</th>
               <th>Title</th>
               <th>Body</th>
               <th>Created</th>
               <th>Updated</th>
          </tr>
        </thead>
      <tbody>


          @if($posts)
              @foreach($posts as $post)
                  <tr>
                    <td>{{$post->id}}</td>
                    <td><img src="{{$post->photo ? $post->photo->file: '/images/unknown.png'}}" alt="" style="border-radius: 10%;height: 20px;"></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category? $post->category->name:'Uncategorized'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body, 12)}}</td>
                    <td>{{$post->created_at->diffForhumans()}}</td>
                    <td>{{$post->updated_at->diffForhumans()}}</td>
                  </tr>
               @endforeach
          @endif
      </tbody>
    </table>



@stop