@extends('layout')
@section('content')
    <div class="container">
        <h2>Trash</h2>
        @foreach($albums as $album)
            <div>
                {{ $album->name_album }}
                <a href="{{ route('album.restore', $album->id) }}">Restore</a>
                <a href="{{ route('album.forceDelete', $album->id) }}" onclick="return confirm('Are you sure you want to permanently delete this album?')">Permanently Delete</a>
            </div>
        @endforeach
    </div>
@endsection
