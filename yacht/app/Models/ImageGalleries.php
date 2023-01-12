<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGalleries extends Model
{
    use HasFactory;
    protected $table = 'image_galleries';
    protected $fillable = [     //cac cot trong table --
        'image_name',
        'image',
        'yacht_id'
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

    public function yachts(){
        return $this->belongsTo(Yachts::class,'yacht_id','id');
    }
}
