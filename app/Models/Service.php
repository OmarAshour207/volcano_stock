<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = ['title', 'details'];
    public function getTranslateValueAttribute()
    {

        $translations = $this->getTranslationsArray();

        return $translations;


    }
    protected $fillable = ['user_id', 'photo'];
    public $timestamps = false;
    protected $appends = ['translate_value'];
}
