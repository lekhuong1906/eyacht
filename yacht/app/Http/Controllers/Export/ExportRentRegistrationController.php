<?php

namespace App\Http\Controllers\Export;

use App\Exports\RentRegistrationExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportRentRegistrationController extends Controller
{
    public function export()
    {
        return Excel::download(new RentRegistrationExport, 'rent_registration'.'.xlsx');
    }
}
