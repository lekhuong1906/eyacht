<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Users extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'user_name',
        'user_card',
        'user_phone',
        'email',
        'password',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    public function rent_registrations(){
        return $this->hasMany(Users::class,'user_id','id');
    }
}
