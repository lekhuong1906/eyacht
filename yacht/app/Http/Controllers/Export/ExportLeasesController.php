<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\Leases;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ExportLeasesController extends Controller
{
    public function export_leases($id){
        $leases =Leases::where('id',$id)->first();
        /*$date =[
            'day' => Carbon::now()->day,
            'month' => Carbon::now()->month,
            'year' => Carbon::now()->year,
        ];*/
        /*return view('export.leases_pdf')->with(['leases'=>$leases]);*/

        $pdf = PDF::loadView('export.leases_pdf',['leases' => $leases])->setPaper('a4', 'portrait');

        return $pdf->download('Leases.pdf');
    }
}
