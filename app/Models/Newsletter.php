<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsletter extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'photo_id',
        'body',
        'is_active'
    ];

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
