@extends('layout')

@section('content')

    <h1>Create a new review for {{$movie->name}}</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action = "{{ action('ReviewController@store', $movie->id) }}" method="POST">
        
        <div  >
            @csrf
            <label for="text">Text</label><br>
            <textarea name="text" style="{{ $errors->has('text') ? 'border: 5px solid red' : ''}}">{{ old('text') }} </textarea>
            {{ $errors->first('text') }}
            <br>
            
            <button type="submit">Create</button>

        </div>
    </form>
@endsection