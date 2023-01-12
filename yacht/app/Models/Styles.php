<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Styles extends Model
{
    use HasFactory;
    protected $table = 'styles';
    protected $fillable = [
        'style_yacht',
        'area',
        'engine',

    ];

    protected $hiden = [

    ];

    protected $casts = [

    ];

    public function yachts(){
        return $this->hasMany(Yachts::class,'style_id','id');
    }
}
