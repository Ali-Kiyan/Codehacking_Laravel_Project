@extends('layouts.admin')



@section('content')



    <h1>Media</h1>


    @if(Session::has('deleted_photo'))


        <p class="alert alert-danger animated zoomInRight">{{session('deleted_photo')}}</p>

    @endif

    @if($photos)
        <table class="table table-condensed animated bounceInUp">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img src="{{$photo->file}}" alt="" style="border-radius: 10%;height: 40px;"></td>
                    <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no data' }}</td>
                    <td>

                    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                    {!! Form::close() !!}




                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif




@stop