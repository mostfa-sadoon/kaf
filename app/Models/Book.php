<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\setting\Bookcategory;
use App\Models\setting\Fileextension;
use App\Models\setting\Subject;
use App\Models\setting\Classe;
use App\Models\setting\Pricesetting;
use App\Models\setting\Semester;

class Book extends Model
{
    //
    protected $table='books';
    protected $guarded=[];
    public function bookcategory()
    {
        return $this->belongsTo(Bookcategory::class);
    }
    public function fileextention()
    {
        return $this->belongsTo(Fileextension::class,'fileextension_id');
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function Pricesetting()
    {
        return $this->belongsTo(Pricesetting::class,'price_id');
    }
}
