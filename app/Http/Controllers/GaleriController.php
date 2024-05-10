<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\User;
use App\Models\Like;
use App\Models\Album;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function foto()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $albums = $user->albums;
            $galeris = $user->galeris;
            return view('foto', compact('albums', 'galeris'));
        }
    }

    // app/Http/Controllers/GaleriController.php

    public function photos($album_id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $albums = $user->albums;
            $galeris = Galeri::where('user_id', $user->id)
                ->where('album_id', $album_id)
                ->get();
            $selectedAlbum = Album::find($album_id);

            return view('photos', compact('albums', 'galeris', 'selectedAlbum'));
        }
    }


    public function detail($galeri_id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $albums = $user->albums;
            $galeri = Galeri::find($galeri_id);
            return view('detail', compact('albums', 'galeri'));
        }
    }

    public function addLike(Request $request, $galeri_id)
    {
        $user = auth()->user();

        // Check if the user has already liked the gallery
        $like = Like::where('user_id', $user->id)
            ->where('galeri_id', $galeri_id)
            ->first();

        if ($like) {
            // Unlike if already liked
            $like->delete();
            $message = 'Like removed successfully!';
        } else {
            // Like if not liked
            Like::create([
                'user_id' => $user->id,
                'galeri_id' => $galeri_id,
            ]);
            $message = 'Like added successfully!';
        }

        return redirect()->back()->with('success', $message);
    }

    public function toggleLike(Request $request, $galeri_id)
    {
        $user = auth()->user();
        $like = $user->likes()->where('galeri_id', $galeri_id)->first();

        if ($like) {
            // Unlike if already liked
            $like->delete();
            $liked = false;
        } else {
            // Like if not liked
            $like = new Like(['galeri_id' => $galeri_id]);
            $user->likes()->save($like);
            $liked = true;
        }

        $likeCount = Like::where('galeri_id', $galeri_id)->count();

        return response()->json(['liked' => $liked, 'likeCount' => $likeCount]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $albums = $user->albums;
            $galeris = Galeri::all();
            return view('foto', compact('albums', 'galeris'));
        }
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/')->with('success', 'Berhasil membuat akun!');
    }

    public function auth(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ], [
            'username.exists' => "This username doesn't exists",
            'password.required' => "This password is required"
        ]);

        $user = $request->only('username', 'password');
        if (Auth::attempt($user)) {
            return redirect()->route('dashboard');
        } else {
            return redirect('/')->with('fail', "Gagal login");
        }
    }

    public function logout()
    {
        // menghapus history login
        Auth::logout();
        // mengarahkan ke halaman login lagi
        return redirect('/');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'judul_foto' => 'required',
            'desc' => 'required',
            'foto_location' => 'required|image|file|mimes:jpeg,png,jpg,gif',
        ]);

        $foto_location = time() . '.' . $request->file('foto_location')->extension();
        $request->file('foto_location')->move(public_path('images'), $foto_location);

        Galeri::create([
            'judul_foto' => $request->judul_foto,
            'desc' => $request->desc,
            'foto_location' => $foto_location,
            'album_id' => $request->album_id,
            'user_id' => Auth::user()->id,
        ]);


        return redirect('/foto')->with('success', 'Berhasil membuat foto!');
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
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        //
    }
}
