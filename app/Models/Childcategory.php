<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = ['name'];
    protected $fillable = ['subcategory_id','slug'];
    public $timestamps = false;

    public function getTranslateValueAttribute()
    {

        $translations = $this->getTranslationsArray();

        return $translations;


    }

    public function subcategory()
    {
    	return $this->belongsTo('App\Models\Subcategory')->withDefault(function ($data) {
			foreach($data->getFillable() as $dt){
				$data[$dt] = __('Deleted');
			}
		});
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
}
