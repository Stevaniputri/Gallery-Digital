<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Galeri extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'judul_foto',
        'desc',
        'foto_location',
        'album_id',
        'user_id',
        'deleted_at'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedByUser($user)
    {
        return $this->likes->where('user_id', $user->id)->count() > 0;
    }

    public function albumfoto()
    {
        return $this->belongsTo(Album::class);
    }

}
