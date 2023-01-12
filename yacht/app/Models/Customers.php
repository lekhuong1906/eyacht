<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Authenticatable
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [     //cac cot trong table --
        'customer_name',
        'customer_card',
        'customer_phone',
        'customer_email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [   //cac cot an
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [        //chuyen doi du lieu
    ];
    public function rent_registrations(){
        return $this->hasMany(Customers::class);
    }
}
