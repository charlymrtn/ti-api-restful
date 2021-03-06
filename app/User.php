<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    // Nombre de la tabla
    protected $table = 'users';

    /**
     * Se elimina autoincrementable
     * @var $incrementing string
     */
    public $incrementing = false;
    protected $primaryKey = 'uuid';
    protected $keyType = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'deleted_at'
    ];

    protected $dates = ['created_at','updated_at','deleted_at'];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Uuid::generate(4)->string;
            }
        });
    }


    public function products()
    {
        return $this->hasMany('App\Models\Product', 'user_uuid', 'uuid');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'user_uuid', 'uuid');
    }
}
