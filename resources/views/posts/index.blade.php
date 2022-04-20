@extends('layouts.app');

@section('content')
    <h1>Posts</h1>

    @if(count($posts)>0)
        @foreach($posts as $post)

            <div class="well">

                <h3 class="mb-4">{{$post}}</h3>

            </div>

        @endforeach

    @else

    @endif
@endsection
