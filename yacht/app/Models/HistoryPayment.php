<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPayment extends Model
{
    use HasFactory;
    protected $table='history_payments';
    protected $fillable = [
        'payment_id',
        'customer_id',
        'payment_total',
        'payment_status',
    ];
    protected $hidden =[];



}
