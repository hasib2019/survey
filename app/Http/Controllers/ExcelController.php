<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ElectionExport;
use App\Exports\VillageExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportBeneficiaries() 
    {
        return Excel::download(new ElectionExport, 'all-Beneficiaries.xlsx');
    }
    public function exportVillage() 
    {
        return Excel::download(new VillageExport, 'Village-Beneficiaries.xlsx');
    }
}
