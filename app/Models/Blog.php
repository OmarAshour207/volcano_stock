<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use \Dimsav\Translatable\Translatable;

    protected $fillable = ['category_id', 'photo', 'source', 'views','updated_at', 'status','meta_tag','meta_description','tags'];

    protected $dates = ['created_at'];

    public $translatedAttributes = ['title', 'details'];

    protected $appends = ['translate_value'];

    public function getTranslateValueAttribute()
    {
        $translations = $this->getTranslationsArray();
        return $translations;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function category()
    {
    	return $this->belongsTo('App\Models\BlogCategory','category_id')->withDefault(function ($data) {
			foreach($data->getFillable() as $dt){
				$data[$dt] = __('Deleted');
			}
		});
    }    

}
