@extends('layouts.app')

@section('content')
 <a href="/posts" class="btn btn-dark  ">Go Back</a>

    <h1 >{{$post->title}}</h1>
     <p >{{$post->body}}</p>
    <hr>
   <small>written on {{$post->created_at}}</small>
    <hr>

    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>



@endsection
