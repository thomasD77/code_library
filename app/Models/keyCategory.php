<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function keys()
    {
        $this->hasMany(Key::class);
    }
}
