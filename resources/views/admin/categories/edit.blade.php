@extends('layouts.admin')



@section('content')


    <h1>Categories</h1>

    @if(Session::has('deleted_category'))


        <p class="alert alert-danger">{{session('deleted_user')}}</p>

    @endif


    <div class="col-sm-6 col-lg-6 col-md-6">



        {!! Form::model($category, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete Category!', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}




    </div>

    <div class="col-sm-6 col-lg-6 col-md-6">





    </div>




@stop