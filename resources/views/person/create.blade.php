@extends('layouts.app')

@section('content')
    <h1>Create a new Person</h1>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form method="POST" action="{{ action('NewPersonController@store') }}">
        @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="name">  
            </div>
            
            <div class="form-group">
              <label for="bio">Biography</label>
              <input type="text" name="biography" class="form-control" id="biography" placeholder="biography">  
            </div>

             <div class="form-group">
                <label for="photo">Photo</label>
                <input type="text" name="photo_url" class="form-control" id="photo" placeholder="photo"> 
              </div>

              <select name="profession_id" id="profesion_id">
                @foreach($professions as $profession)
                  <option value="{{ $profession->id }}">{{$profession->name}}</option>
                @endforeach
              </select><br/><br/><br/><br/>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

@endsection