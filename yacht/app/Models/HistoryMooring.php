<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryMooring extends Model
{
    use HasFactory;
    protected $table='history_moorings';
    protected $fillable = [
        'marina_id',
        'yacht_id',
    ];

    public function marinas(){
        return $this->belongsTo(Marinas::class,'marina_id','id');
    }
    public function yachts(){
        return $this->belongsTo(Yachts::class,'yacht_id','id');
    }

}
