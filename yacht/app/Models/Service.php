<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'service_name',
        'service_price',
        'service_status',
    ];
    protected $hidden = [

    ];
    protected $casts = [

    ];
    public function rent_registrations(){
        return $this->hasMany(RentRegistrations::class);
    }
}
