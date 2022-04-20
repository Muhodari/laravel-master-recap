@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1>
<p> {{$description}}</p>

{{--accessing data from array--}}
<ul>
    @if(count($services) > 0)
        @foreach($services as $service)
         <li>{{$service}}</li>

        @endforeach

    @endif
</ul>
@endsection

