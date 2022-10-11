<?php


namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use PHPUnit\Framework\MockObject\Verifiable;

class Driver extends Authenticatable  implements JWTSubject
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'photo', 'country_code', 'national_id', 'city_id', 'has_messages', 'mobile_id', 'fcm_token', 'longitude', 'latitude'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'phone_verified_at' => 'datetime',
    ];


    public function  getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/images/drivers/' . $val) : "";
    }


    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }






    //////////// Relations \\\\\\\\\\\\

    public function orders()
    {
        return $this->hasMany(Order::class, 'driver_id', 'id');
    }

    public function delivery_rejected_orders()
    {
        return $this->hasMany(DriverRejectedOrder::class, 'driver_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'driver_id', 'id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id' , 'id');
    }
}
