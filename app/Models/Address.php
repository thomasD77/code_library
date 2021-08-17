<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $fillable = [
      'street',
      'number',
      'postbox',
      'city',
      'country',
    ];

    public $sortable = ['id', 'street', 'number', 'postbox', 'city', 'country'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_address');
    }

}
