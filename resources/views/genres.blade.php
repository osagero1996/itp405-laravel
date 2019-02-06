@extends('hw2layout')

@section('mainpage')
<table class="table">
		<tr>
			<th>Genres</th>
		</tr>
		@foreach($genres as $genre)
			<tr>
				<td>

					<a href="/tracks?genre={{urlencode($genre->Name)}}"> {{$genre->Name}} </a>
					<a class="btn btn-primary" href="/genres/{{$genre->GenreId}}/edit" role="button">Edit</a>


				</td>
			</tr>
		@endforeach
	</table>
@endsection
