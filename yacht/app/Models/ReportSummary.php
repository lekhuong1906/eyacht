<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportSummary extends Model
{
    use HasFactory;
    protected $table='report_summaries';
    protected $fillable=[
        'total_sale',
        'total_revenue',
        'amount_access',
        'total_rent',
        'total_contract',
        'total_customer',
    ];
    protected $casts=[
        'created_at' => 'datetime:Y-m-d',
    ];
}
