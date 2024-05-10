<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'galeri_id' => 'required',
        ]);

        $user = auth()->user();

        // Check if the user has already liked the gallery
        $like = Like::where('user_id', $user->id)
            ->where('galeri_id', $request->galeri_id)
            ->first();

        if ($like) {
            // Unlike if already liked
            $like->delete();
            $message = 'Like removed successfully!';
        } else {
            // Like if not liked
            $like = new Like(['galeri_id' => $request->galeri_id]);
            $user->likes()->save($like);
            $message = 'Like added successfully!';
        }

        return redirect()->back()->with('success', $message);
    }
    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
    }
}
