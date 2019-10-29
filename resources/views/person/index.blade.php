@extends('layouts.app')

@section('content')
    <h1>Persons</h1>

    @foreach($persons as $person)
        <div>
            <h2> 
                <a href="{{ action('NewPersonController@show', $person->id)}}">{{$person->name}} </a>         
            </h2>
        </div>
    @endforeach

    {{ $persons-> links() }}


@endsection