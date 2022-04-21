@extends('layouts.app')


@section('content')

    <h1>Create Post</h1>

    {!! Form::open(['action' =>'\App\Http\Controllers\PostsController@store', 'method ' => 'POST ']) !!}


    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>

    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::text('body','',['class' => 'form-control', 'placeholder' => 'body'])}}
    </div>

    {!! Form::close() !!}



@endsection
