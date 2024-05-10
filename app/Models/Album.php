<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Album extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name_album',
        'desc',
        'user_id',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function galeris()
    {
        return $this->hasMany(Galeri::class, 'album_id')->withTrashed();
    }
    
    public function photos()
    {
        return $this->hasMany(Galeri::class, 'album_id')->withTrashed();
    }
}
