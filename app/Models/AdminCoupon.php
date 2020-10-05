<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminCoupon extends Model
{
    protected $table = 'admin_coupons';

    protected $fillable = ['code', 'type', 'price', 'times', 'start_date','end_date','admin_id'];

    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'admin_id');
    }
}
