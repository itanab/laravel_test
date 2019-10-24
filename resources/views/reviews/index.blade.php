@extends('layout')

@section('content')

    <h2>Reviews of {{$movie->name}}</h2>

    @if($reviews->count() == 0)
        <p>No reviews yet</p>
    @else
        @foreach($reviews as $review)
            <p>{{$review->text}}</p>
        @endforeach
    @endif
    <a href="{{ action('NewMovieController@show', $movie) }}">Back to reviews</a>
@endsection