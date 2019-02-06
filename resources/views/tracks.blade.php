@extends('hw2layout')

@section('mainpage')
<a class="btn btn-primary" href="/tracks/new" role="button">Add Track</a>
<table class="table">
		<tr>
			<th>Tracks</th>
      <th>Album</th>
      <th>Artist</th>
      <th>Price</th>
		</tr>
    
    @foreach($tracks as $track)
    <tr>
    <td>{{$track->song}}</td>
    <td>{{$track->title}}</td>
    <td>{{$track->artist}}</td>
    <td>{{$track->price}}</td>
  </tr>
	@endforeach

	</table>
@endsection