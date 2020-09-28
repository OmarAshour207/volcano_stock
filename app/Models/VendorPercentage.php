<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorPercentage extends Model
{
    protected  $fillable = ['percentage','vendor_id','category_id'];

    public function vendor() {
        return $this->belongsTo(User::class,'vendor_id');
    }

    public function category() {
        return $this->belongsTo(Category::class,'category_id');
    }
}
