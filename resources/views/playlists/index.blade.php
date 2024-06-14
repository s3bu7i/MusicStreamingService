@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Playlists</h1>
    <a href="{{ route('playlists.create') }}" class="btn btn-primary">Create Playlist</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($playlists as $playlist)
            <tr>
                <td>{{ $playlist->name }}</td>
                <td>
                    <a href="{{ route('playlists.edit', $playlist->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('playlists.destroy', $playlist->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection