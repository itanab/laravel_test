@extends('layout')

@section('content')

    <h2>Reviews of {{$movie->name}}</h2>
    @foreach($reviews as $review)
    <p>{{$review->text}}</p>
    @endforeach

    <a href="{{ action('NewMovieController@show', $movie) }}">Back to reviews</a>
@endsection