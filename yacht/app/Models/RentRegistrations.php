<?php

namespace App\Models;

use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentRegistrations extends Model
{
    use HasFactory;
    protected $table = 'rent_registrations';
    protected $fillable = [
        'rent_regis_name',
        'yacht_id',
        'user_id',
        'customer_id',
        'service_id',
        'rental_date',
        'rental_hours',
        'created_at',
    ];

    protected $hidden = [

    ];
    public function services(){
        return $this->belongsTo(Service::class,'service_id','id');
    }
    public function yachts(){
        return $this->belongsTo(Yachts::class,'yacht_id','id');
    }
    public function customers(){
        return $this->belongsTo(Customers::class,'customer_id','id');
    }
        public function leases(){
        return $this->hasOne(RentRegistrations::class,'rent_regis_id','id');
    }
    public function users(){
            return $this->belongsTo(Users::class, 'user_id', 'id');
    }
    public function tours(){
        return $this->belongsTo(Tour::class,'tour_id','id');
    }
    //localScope
    public function scopeSearch($query){
        if($search = request()->search){
            $query = $query->where('rent_registration_name','like','%'.$search.'%')->orwhere('rental_date','like','%'.$search.'%');
        }
        return $query;
    }

    public function scopeYacht($query){
        if($yacht =request()->yacht){
            $query = $query->where('yacht_id',$yacht);
        }
        return $query;
    }

    public function scopeService($query){
        if($service=request()->service){
            $query=$query->where('service_id',$service);
        }
        return $query;
    }

    public function scopeDate($query){
        if(($from=request()->from) and ($to=request()->to)) {
            $query=$query->whereBetween('rental_date', array($from, $to));
        }
        return $query;
    }


}
