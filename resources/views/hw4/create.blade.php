@extends('layout')

@section('title', 'Create Track')


@section('main')
<div class="row">
  <div class="col">
    <form action="/tracks" method="post">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
        <small class="text-danger">{{$errors->first('name')}}</small>
      </div>

      <div class="form-group">
        <label for="album">Album</label>
        <select class="form-control" name="albumSelect">
          @foreach($albums as $album)
           <option value="{{$album->AlbumId}}" {{$album->AlbumId == old('albumSelect') ? "selected" : ""}}>{{$album->Title}}</option>
           @endforeach
         </select>
         <small class="text-danger">{{$errors->first('albumSelect')}}</small>
      </div>

      <div class="form-group">
        <label for="media_type">Media Type</label>
        <select class="form-control" name="mediaSelect">
          @foreach($media_types as $media_type)
           <option value="{{$media_type->MediaTypeId}}" {{$media_type->MediaTypeId == old('mediaSelect') ? "selected" : ""}}>{{$media_type->Name}}</option>
           @endforeach
         </select>
         <small class="text-danger">{{$errors->first('mediaSelect')}}</small>
      </div>

      <div class="form-group">
        <label for="genre">Genre</label>
        <select class="form-control" name="genreSelect">
          @foreach($genres as $genre)
           <option value="{{$genre->GenreId}}" {{$genre->GenreId == old('genreSelect') ? "selected" : ""}}>{{$genre->Name}}</option>
           @endforeach
        </select>
        <small class="text-danger">{{$errors->first('genreSelect')}}</small>
      </div>

      <div class="form-group">
        <label for="composer">Composer</label>
        <input type="text" id="composer" name="composer" class="form-control" value="{{old('composer')}}">
        <small class="text-danger">{{$errors->first('composer')}}</small>
      </div>

      <div class="form-group">
        <label for="milliseconds">Milliseconds</label>
        <input type="number" id="milliseconds" name="milliseconds" class="form-control" value="{{old('milliseconds')}}">
        <small class="text-danger">{{$errors->first('milliseconds')}}</small>
      </div>

      <div class="form-group">
        <label for="bytes">Bytes</label>
        <input type="number" id="bytes" name="bytes" class="form-control" value="{{old('bytes')}}">
        <small class="text-danger">{{$errors->first('bytes')}}</small>
      </div>

      <div class="form-group">
        <label for="unitprice">UnitPrice</label>
        <input type="number" id="unitprice" name="unitprice" class="form-control" value="{{old('unitprice')}}">
        <small class="text-danger">{{$errors->first('unitprice')}}</small>
      </div>



      <button type="submit" class="btn btn-primary">
        Save
      </button>
    </form>
  </div>
</div>


@endsection
