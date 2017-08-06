@extends('layouts.admin')





@section('content')




    @if(count($comments)> 0)

    <table class="table table-condensed text-center table-hover">
      <thead>
          <tr>
            <th>ID</th>
            <th>Author</th>
            <th>body</th>
            <th>Email</th>
            <th style="background-color: whitesmoke">View</th>
            <th style="background-color: whitesmoke">Replies</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
      <tbody>

          @foreach($comments as $comment)
          <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->author}}</td>
            <td>{{str_limit($comment->body, 17)}}</td>
            <td>{{$comment->email}}</td>
            <td style="background-color: whitesmoke"><a href="{{route('home.post', $comment->post->slug)}}">View Post</a></td>
            <td style="background-color: whitesmoke"><a href="{{route('admin.comment.replies.show', $comment->id)}}">View Replies</a></td>

              <td class="animated bounceInRight">

                  @if($comment->is_active == 1)

                      {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
                      <input type="hidden" name="is_active" value="0">
                          <div class="form-group pull-right">
                              {!! Form::submit('Un-approve', ['class'=>'btn btn-primary btn-sm']) !!}
                          </div>
                      {!! Form::close() !!}

                      @else

                      {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
                      <input type="hidden" name="is_active" value="1">
                      <div class="form-group pull-right">
                          {!! Form::submit('Approve', ['class'=>'btn btn-success btn-sm']) !!}
                      </div>
                      {!! Form::close() !!}




                  @endif


              </td>



              <td class="animated bounceInRight">

                  {!! Form::open(['method' => 'DELETE', 'action' => ['PostCommentsController@destroy', $comment->id]]) !!}

                  <div class="form-group pull-left">
                     {!! Form::submit('Delete !', ['class'=>' btn btn-danger btn-sm']) !!}
                  </div>
                  {!! Form::close() !!}


              </td>


          </tr>
          @endforeach
      </tbody>
    </table>

      @else

        <h1 class="text-center animated bounce">No Comment</h1>


    @endif



@stop