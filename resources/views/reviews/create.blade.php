@extends('layout')

@section('content')

    <h1>Create a new review for {{$movie->name}}</h1>

    <form action = "{{ action('ReviewController@store', $movie->id) }}" method="POST">
        
        <div>
            <label for="value">Text</label><br>
            <textarea name="text"></textarea><br>
            <button type="submit">Create</button>

        </div>
    </form>
@endsection