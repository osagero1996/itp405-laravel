<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
  protected $primaryKey = 'TrackId';
  public $timestamps = false;

  public function playlists(){
    return $this->belongsToMany('App\Playlist', 'playlist_track', 'TrackId', 'PlaylistId');
  }

  public function genre(){
    return $this->belongsTo('App\Genre', 'GenreId');
  }
}
