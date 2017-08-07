@extends('layouts.admin')



@section('content')



    <h1>Media</h1>


    @if(Session::has('deleted_photo'))


        <p class="alert alert-danger animated zoomInRight">{{session('deleted_photo')}}</p>

    @elseif(Session::has('multiple_deleted_photo'))

        <p class="alert alert-danger animated zoomInRight">{{session('multiple_deleted_photo')}}</p>

    @endif

    @if($photos)


      <form action="/delete/media" method="post" class="form-inline">

          {{csrf_field()}}

          {{method_field('delete')}}

        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
              <option value="delete">Delete</option>
            </select>
        </div>
        <div class="form-group">
           <input type="submit" class="btn btn-primary">
        </div>


        <table class="table table-condensed animated fadeInRightBig">
            <thead>
            <tr>
                <th><input type="checkbox" id="options"></th>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
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
       </form>
    @endif




@stop


@section('scripts')

<script>

    $(document).ready(function(){


        $('#options').click(function(){


           if (this.checked){

               $('.checkBoxes').each(function(){

                   this.checked = true;

               });

           }else{

               $('.checkBoxes').each(function(){

                   this.checked = false;

               });

           }


        });



    });


</script>

@stop