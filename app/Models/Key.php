<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Key extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'project_id',
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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
