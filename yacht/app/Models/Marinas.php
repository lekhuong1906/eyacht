<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marinas extends Model
{
    use HasFactory;
    protected $table = 'marinas';
    protected $fillable = [     //cac cot trong table --

        'marina_name',
        'marina_address',
        'coordinate',
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

    public function histories(){
        return $this->hasMany(HistoryMooring::class,'marina_id','id');
    }
    public function marina_from(){
        return $this->hasMany(Tour::class,'from','id');
    }
    public function marina_to(){
        return $this->hasMany(Tour::class,'to','id');
    }
}
