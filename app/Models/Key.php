<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'login',
        'password',
        'subject_id',
        'email',
        'url',
    ];

    public function subject()
    {
        return $this->belongsTo(keyCategory::class);
    }
}
