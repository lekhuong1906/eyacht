<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leases extends Model
{
    use HasFactory;
    protected $table = 'leases';
    protected $fillable = [     //cac cot trong table --
        'rent_registration_name',
        'rent_registration_code',
        'leases_price',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [   //cac cot an

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [        //chuyen doi du lieu
    ];

    public function rent_registrations(){
        return $this->belongsTo(RentRegistrations::class,'rent_regis_id','id');
    }

}
