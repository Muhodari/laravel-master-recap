@extends('layouts.app')

@section('content')
 <a href="/posts" class="btn btn-default  ">Go Back</a>

    <h1 >{{$post->title}}</h1>
 <div class="card">
     <h3>{{$user->name}}</h3>
 </div>

 <div class="row">


     <div class="col-md-12">


      <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}" alt="Image">

     </div>

 </div>


     <p >{{$post->body}}</p>
    <hr>
   <small>written on {{$post->created_at}}</small>


 @if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)

     <hr>
 <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

 {!! Form::open(
    ['action'=>['\App\Http\Controllers\PostsController@destroy',$post->id],
    ' method' => 'POST',
    'class'  => 'pull-right'
    ])!!}

{{Form::hidden('_method','DELETE')}}
 {{Form::submit('Delete',['class'=>'btn btn-danger'])}}

 {!! Form::close() !!}
    @endif
 @endif


@endsection
