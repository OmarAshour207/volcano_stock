<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'parent_id',
        'price'
    ];

    // relations
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'parent_id');
    }
}
