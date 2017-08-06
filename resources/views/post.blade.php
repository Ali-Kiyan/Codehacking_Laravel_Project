@extends('layouts.blog-post')




@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive animated fadeInLeft" src="{{$post->photo? $post->photo->file : '/images/unknownpost.jpg'}}" alt="" style="width: 30%;">

    <hr>

    <!-- Post Content -->


    <p class="lead">{{$post->body}}</p>


    <hr>

    @if(Session::has('comment_message'))

       <div class="bg-success animated headShake"> {{session('comment_message')}}
       </div>

    @endif

    <!-- Blog Comments -->

    @if(Auth::check())

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>



        {!! Form::open(['method' => 'POST', 'action' => 'PostCommentsController@store']) !!}


            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="form-group">
                {!! Form::label('body', '  ') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3])!!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}


    </div>

    @endif

    <hr>

    <!-- Posted Comments -->



    @if(count($comments) > 0)


        @foreach($comments as $comment)
    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
            {{--<img height="64" class="media-object" src="{{Auth::user()->gravatar}}" alt="">--}}
            {{--using gravatar insetead of actual photo--}}
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
           <p>{{$comment->body}}</p>


        @if(count($comment->replies) > 0)


            @foreach($comment->replies as $reply)


                @if($reply->is_active == 1)


                                            <!-- Nested Comment -->
                                            <div id="nested-comment" class="media">
                                                <a class="pull-left" href="#">
                                                    <img height="64px" class="media-object" src="{{$reply->photo ? $reply->photo : '/images/unknownpost.jpg'}}" alt="reply image">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{$reply->author}}
                                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                                    </h4>
                                                   <p>{{$reply->body}}</p>
                                                </div>

                                                <div class="comment-reply-container">



                                                      <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                                                      <div class="comment-reply col-lg-9 col-sm-9 col-md-9" id="reply-section">


                                                            {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}
                                                                <div class="form-group">

                                                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">


                                                                    {!! Form::label('body', '  ') !!}
                                                                    {!! Form::textarea('body', null, ['class'=>'form-control reply-section','rows'=>1])!!}
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                                                                </div>
                                                            {!! Form::close() !!}


                                                      </div>
                                                 </div>
                                            <!-- End Nested Comment -->
                                            </div>


                 @else

                    <h1 class="text-center">No replies</h1>

                 @endif
             @endforeach
     @else




                <button class="toggle-reply2 btn btn-primary pull-right">Reply</button>
                <div class="comment-reply-first-level col-lg-9 col-sm-9 col-md-9" id="reply-section">
                {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}
                <div class="form-group">

                    <input type="hidden" name="comment_id" value="{{$comment->id}}">


                    {!! Form::label('body', '  ') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control reply-section','rows'=>1])!!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                </div>



     @endif





        </div>
    </div>


        @endforeach

    @endif


@stop

@section('sidebar')

    <div class="well">
        <h4>Category</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">

                    <li><a href="#">{{$post->category ? $post->category->name : 'Not specified'}}</a>
                    </li>
                </ul>
            </div>
            {{--<div class="col-lg-6">--}}
                {{--<ul class="list-unstyled">--}}
                    {{--<li><a href="#">Category Name</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#">Category Name</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#">Category Name</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#">Category Name</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
        <!-- /.row -->
    </div>

@stop


@section('scripts')

    <script>

           $(".comment-reply-container .toggle-reply").click(function(){

             $(this).next().slideToggle("swing");

           });
           $(".toggle-reply2").click(function(){

               $(this).next().slideToggle("swing");

           });

    </script>

@stop




