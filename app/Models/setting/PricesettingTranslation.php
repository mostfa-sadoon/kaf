<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Model;

class PricesettingTranslation extends Model
{
    // test
    public $translatedAttributes = ['name'];
    protected $table='pricesettingtranslations';
    protected $guarded=[];
}
