@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Songs</h1>
    <a href="{{ route('songs.create') }}" class="btn btn-primary">Add Song</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Album</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($songs as $song)
            <tr>
                <td>{{ $song->title }}</td>
                <td>{{ $song->artist }}</td>
                <td>{{ $song->album }}</td>
                <td>{{ $song->genre }}</td>
                <td>
                    <a href="{{ route('songs.edit', $song->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('songs.destroy', $song->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <audio controls>
                        <source src="{{ $song->file_path }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection