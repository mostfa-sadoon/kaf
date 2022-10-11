<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribtion extends Model
{

  protected $table = 'subscribtions';
  protected $guarded = [];




  public function getStatus()
  {
    return  $this->status  == 0 ?  'غير مفعل'   : 'مفعل';
  }

  public function getType()
  {
    if ($this->type  == 1) {
      return 'أسبوعي';
    } elseif ($this->type  == 2) {
      return 'شهري';
    } elseif ($this->type  == 3) {
      return 'سنوي';
    }
  }

  public function getUser()
  {
    if ($this->user_type == 1) {
      return $this->user;
    } elseif ($this->user_type == 2) {
      return $this->teacher;
    }
  }


  //////////// Relations \\\\\\\\\\\\

  public function subscribtion_kind()
  {
    return $this->belongsTo(SubscribtionKind::class, 'subscribtion_kind_id', 'id');
  }

  public function user()
  {
    // return $this->belongsTo(User::class, 'user_id', 'id')->where('user_type', 1);
    return $this->belongsTo(User::class, 'user_id', 'id')->join('subscribtions', 'subscribtions.user_id', 'users.id')->where('user_type', 1);
  }

  public function teacher()
  {
    return $this->belongsTo(Teacher::class, 'user_id', 'id')->join('subscribtions', 'subscribtions.user_id', 'teachers.id')->where('user_type', 2);
  }
}
