<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class GenresController extends Controller
{
    //
    public function index(Request $request)
    {
      $query = DB::table('genres');

      $genres = $query->get();


      return view('genres', [
        'genres' => $genres,
      ]);

    }

    public function edit($genreId = null){
      if($genreId){
        $genre = DB::table('genres')->where('GenreId', '=', $genreId)->first();
        return view('hw4.gedit', [
          'genre' => $genre,
        ]);
      }
    }

    public function store($genreId, Request $request){
      $input = $request->all();
      // dd($genreId);

      //the unique keys checks DB to make sure Name is unique
      $validation = Validator::make($input, [
        'name' => 'required|min:3|unique:genres,Name'

      ]);

      //if validation fails, redirect back to form with errors
      if($validation->fails()){
        return redirect("genres/$genreId/edit")
        ->withInput()
        ->withErrors($validation);
      }

      DB::table('genres')
        ->where('GenreId', '=', $genreId)
        ->update([
          'Name' => $request->name
        ]);



      //redirect back to /playlists
      return redirect('/genres');
    }
}
