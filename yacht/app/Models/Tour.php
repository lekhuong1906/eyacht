<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $table='tours';
    protected $fillable=[
      'tour_name',
      'tour_describe',
      'from',
      'to',
      'tour_price',
    ];
    public function from_marina(){
        return $this->belongsTo(Marinas::class,'from','id');
    }
    public function to_marina(){
        return $this->belongsTo(Marinas::class,'to','id');
    }
    public function rent_regis(){
        return $this->hasMany(RentRegistrations::class,'tour_id','id');
    }
}
