<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'number',
        'postbox',
        'city',
        'country',
        'name',
        'remarque'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
