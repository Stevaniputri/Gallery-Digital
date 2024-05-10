<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function album()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $albums = $user->albums;
            $galeris = $user->galeris;
            return view('album', compact('albums', 'galeris'));
        }
    }

    public function trash()
    {
        $albums = Album::onlyTrashed()->get();
        return view('trash', compact('albums'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name_album' => 'required|min:3',
            'desc' => 'required|min:5',
        ]);

        Album::create([
            'name_album' => $request->name_album,
            'desc' => $request->desc,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/album')->with('success', 'Album berhasil dibuat');
    }

    // Tambahkan di AlbumController.php
    public function restore($albumId)
    {
        // Retrieve the album (including soft deleted)
        $album = Album::withTrashed()->findOrFail($albumId);

        // Get the photos associated with the album (including soft deleted)
        $photos = Galeri::withTrashed()->where('album_id', $album->id)->get();

        // Restore the album
        $album->restore();

        // Restore the photos manually
        foreach ($photos as $photo) {
            $photo->restore();
        }

        // Redirect back to the album page
        return redirect('/album')->with('success', 'Album and associated photos successfully restored');
    }

    public function delete($albumId)
    {
        // Retrieve the album
        $album = Album::findOrFail($albumId);

        // Get the photos associated with the album
        $photos = $album->galeris;

        // Delete the photos manually
        foreach ($photos as $photo) {
            $photo->delete();
        }

        // Soft delete the album
        $album->delete();

        // Redirect back to the album page
        return redirect('/album')->with('success', 'Album and associated photos successfully deleted');
    }


    public function forceDelete($id)
    {
        $album = Album::withTrashed()->find($id);

        if ($album) {
            // Use the delete method on the relationship to delete associated photos
            $album->photos()->delete();

            // Permanently delete the album
            $album->forceDelete();

            return redirect('/album/trash')->with('success', 'Album and associated photos permanently deleted');
        }

        return redirect('/album/trash')->with('error', 'Album not found');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($albumId)
    {
        // Retrieve the album
        $album = Album::withTrashed()->findOrFail($albumId);

        // Get the photos associated with the album
        $photos = Galeri::where('album_id', $album->id)->get();

        // Permanently delete the photos associated with the album
        foreach ($photos as $photo) {
            // Delete the photo from storage
            Storage::delete('images/' . $photo->foto_location);

            // Permanently delete the photo
            $photo->forceDelete();
        }

        // Permanently delete the album
        $album->forceDelete();

        // Redirect back to the album page
        return redirect('/album')->with('success', 'Album and associated photos permanently deleted');
    }
}
