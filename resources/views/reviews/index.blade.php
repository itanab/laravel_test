@extends('layout')

@section('content')

    <h2>Reviews of {{$movie->name}}</h2>

    @if($reviews->count() == 0)
        <p>No reviews yet</p>
    @else
        @foreach($reviews as $review)
            <p>{{$review->text}}</p>
            @if($review->user)
                <p>Made with love by {{ $review->user->name }} </p>
            @endif
        @endforeach
    @endif
    <a href="{{ action('NewMovieController@show', $movie) }}">Back to movie detail</a><br/>

    {{-- @if(auth()->user() !=null) --}}
    @if(auth()->check())
        <a href="{{ action('ReviewController@create', $movie) }}">Create a review</a>
    @endif
@endsection