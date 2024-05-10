<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [Controller::class, 'index'])->name('welcome');
Route::post('/register', [GaleriController::class, 'register'])->name('register.input');
Route::post('/login', [GaleriController::class, 'auth'])->name('login.auth');
Route::get('/logout', [GaleriController::class, 'logout']);

Route::get('/dashboard', [GaleriController::class, 'dashboard'])->name('dashboard');

Route::get('/album', [AlbumController::class, 'album'])->name('album');
Route::post('/create-album', [AlbumController::class, 'create'])->name('create.album');

Route::get('/foto', [GaleriController::class, 'foto'])->name('foto');
Route::post('/create-foto', [GaleriController::class, 'create'])->name('create.foto');

// Route::get('/detail', [GaleriController::class, 'detail'])->name('detail');
Route::get('/detail/{galeri_id}', [GaleriController::class, 'detail'])->name('detail');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/toggle-like/{galeri_id}', [GaleriController::class, 'toggleLike'])->name('toggle-like');

Route::get('/photos/{album_id}', [GaleriController::class, 'photos'])->name('photos.album');
Route::get('/album/trash', [AlbumController::class, 'trash'])->name('album.trash');

Route::get('/album/delete/{id}', [AlbumController::class, 'delete'])->name('album.delete');
Route::get('/album/restore/{id}', [AlbumController::class, 'restore'])->name('album.restore');
Route::get('/album/force-delete/{id}', [AlbumController::class, 'forceDelete'])->name('album.forceDelete');

