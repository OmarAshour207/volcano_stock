<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = ['name'];
    public function getTranslateValueAttribute()
    {

        $translations = $this->getTranslationsArray();

        return $translations;


    }
    protected $fillable = ['slug','photo','is_featured','image'];
    public $timestamps = false;
    protected $appends = ['translate_value'];

    public function subs()
    {
    	return $this->hasMany('App\Models\Subcategory')->where('status','=',1);
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_replace(' ', '-', $value);
    }

    public function attributes() {
        return $this->morphMany('App\Models\Attribute', 'attributable');
    }

    public function percentage() {
        return $this->hasOne(VendorPercentage::class,'category_id');
    }


}
