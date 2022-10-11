<?php

namespace App\Models;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Model;

class SubscribtionKind extends Model
{
    use Translatable;


    // protected $with = ['translations'];

    protected $table = 'subscribtions_kinds';
    protected $guarded = [];

    protected $translatedAttributes = ['name'];
    protected $hidden = ['translations'];

   




  //////////// Relations \\\\\\\\\\\\

  



}
