@extends('layout')

@section('title', 'Edit Genre')

@section('main')
  <div class="row">
    <div class="col">
      <form action="/genres/{{$genre->GenreId}}/edit" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control" value="{{old('name') == "" ? $genre->Name : old('name')}}">
          <small class="text-danger">{{$errors->first('name')}}</small>
        </div>
        <button type="submit" class="btn btn-primary">
          Save
        </button>
      </form>
    </div>
  </div>
@endsection
