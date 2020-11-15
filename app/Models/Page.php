<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title'];

    public function getTranslateValueAttribute()
    {
        $translations = $this->getTranslationsArray();
        return $translations;
    }

    protected $fillable = ['slug', 'details','meta_tag','meta_description'];
    protected $appends = ['translate_value'];
}
