@extends('layouts.admin')





@section('content')




    @if(count($replies))

        <table class="table table-condensed text-center table table-striped table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>body</th>
                <th>Email</th>
                <th style="background-color: whitesmoke">View</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{str_limit($reply->body, 17)}}</td>
                    <td>{{$reply->email}}</td>
                    <td style="background-color: whitesmoke"><a href="{{route('home.post', $reply->comment->post->id)}}">View Post</a></td>

                    <td class="animated bounceInRight">

                        @if($reply->is_active == 1)

                            {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group pull-right">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-primary btn-sm']) !!}
                            </div>
                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group pull-right">
                                {!! Form::submit('Approve', ['class'=>'btn btn-success btn-sm']) !!}
                            </div>
                            {!! Form::close() !!}




                        @endif


                    </td>



                    <td class="animated bounceInRight">

                        {!! Form::open(['method' => 'DELETE', 'action' => ['CommentRepliesController@destroy', $reply->id]]) !!}

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

        <h1 class="text-center animated bounce">No Replies</h1>

    @endif



@stop