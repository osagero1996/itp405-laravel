<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class TracksController extends Controller
{
    //
    public function index(Request $request)
    {
      if($request->input('genre') == ""){
        $query = DB::table('tracks')
                    ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
                    ->join('artists', 'albums.artistId', '=', 'artists.artistId')
                    ->select('tracks.Name as song', 'albums.Title as title',
                    'artists.Name as artist', 'tracks.UnitPrice as price');

        $tracks = $query->get();


        return view('tracks', [
          'tracks' => $tracks,
        ]);
      }else{
        $genreQuery = DB::table('genres')->select('GenreId')->where('Name', '=', $request->input('genre'));
        $genres = $genreQuery->get();
        $genreId="";

        foreach($genres as $genre){
          $genreId=$genre->GenreId;
        }

        $query = DB::table('tracks')
                    ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
                    ->join('artists', 'albums.artistId', '=', 'artists.artistId')
                    ->select('tracks.Name as song', 'albums.Title as title',
                    'artists.Name as artist', 'tracks.UnitPrice as price')
                    ->where('tracks.GenreId', '=', $genreId);

        $tracks = $query->get();





        return view('tracks',[
          'tracks' => $tracks,
          'testing' => "testing",
        ]);
      }
    }


    public function create(Request $request){

      $albums = DB::table('albums')->get();
      $media_types = DB::table('media_types')->get();
      $genres = DB::table('genres')->get();
      return view('hw4.create', [
        'albums'=> $albums,
        'media_types' => $media_types,
        'genres' => $genres,
      ]);
    }

    public function store(Request $request){

      $input = $request->all();

      $validation = Validator::make($input, [
        'name' => 'required',
        'albumSelect' => 'required',
        'mediaSelect' => 'required',
        'genreSelect' => 'required',
        'composer' => 'required',
        'milliseconds' => 'required|numeric',
        'bytes' => 'required|numeric',
        'unitprice' => 'required|numeric'
      ]);

      if($validation->fails()){
        return redirect('tracks/new')
        ->withInput()
        ->withErrors($validation);
      }


      DB::table('tracks')->insert([
        'Name' => $request->name,
        'AlbumId' => $request->albumSelect,
        'MediaTypeId' => $request->mediaSelect,
        'GenreId' => $request->genreSelect,
        'Composer' => $request->composer,
        'Milliseconds' => $request->milliseconds,
        'Bytes' => $request->bytes,
        'UnitPrice' => $request->unitprice
      ]);

      return redirect('/tracks');

    }


}
