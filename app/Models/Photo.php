<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'file',
        'backend_id',
        'frontend_id',
        'server_id',
        'general_id',
    ];

    protected $uploads = '/';
    public function getFileAttribute($photo)
    {
        return $this->uploads . $photo;
    }

    public function backend()
    {
        return $this->belongsTo(Photo::class);
    }
}
