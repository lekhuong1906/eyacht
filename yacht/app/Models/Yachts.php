<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yachts extends Model
{
    use HasFactory;

    protected $table = 'yachts';

    protected $fillable =[
        'yacht_name',
        'style_id',
        'yacht_number_plate',
        'yacht_price',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    public function styles(){
        return $this->belongsTo(Styles::class,'style_id','id');
    }
    public function images()
    {
        return $this->hasMany(ImageGalleries::class, 'yacht_id', 'id');
    }
    public function rent_registrations(){
        return $this->hasMany(Yachts::class);
    }
    public function histories(){
        return $this->hasOne(HistoryMooring::class,'yacht_id','id');
    }

    public function getThumbnailAttribute(){
        return $this->images->first()->image ?? '';
    }

    //localScope


}
