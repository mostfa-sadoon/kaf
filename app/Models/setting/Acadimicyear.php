<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Acadimicyear extends Model implements TranslatableContract
{
    //
    protected $table='acadimicyears';
    use Translatable;
    public $translatedAttributes = ['name'];
    protected $guarded=[];
}
