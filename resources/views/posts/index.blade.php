@extends('layouts.app');

@section('content')
    <h1>Posts</h1>

    @if(count($posts) > 1)
        @foreach($posts as $post)

            <div class="well mb-4">

                <h3 ><a href="/posts/{{$post['id']}}">{{ $post['title'] }}</a> </h3>
                <small>written on {{$post['created_at']}} </small>


            </div>

        @endforeach

    @else

    @endif
@endsection
