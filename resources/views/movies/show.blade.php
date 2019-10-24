<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        img{
                width: 200px;
                height: auto;
            }
    
            .movie{
                padding:2rem;
                margin:1rem;
                border: 3px solid green;
                box-shadow: 1px;
                width: 300px;
                text-align: center;
            }
    
            p{
                color:red;
                font-weight: bold;
            }

    </style>
</head>
<body>
    
@extends('layout')

@section('content')
    
        <div class="movie">
            <h2>{{ $movie->name }}</h2>
            <p>{{ $movie->rating }}</p>
            <img src="{{ $movie->poster_url}}">
            <h4>{{ $movie->year}}</h4>
            <a href="{{ action('NewMovieController@index') }}">Back to list of movies</a><br>
            <a href="{{ action('ReviewController@index', $movie) }}">Show the reviews</a>

        </div>

@endsection

</body>
</html>
