<?php

namespace App\Exports;

use App\Models\ElectionSurvey;
use Maatwebsite\Excel\Concerns\FromCollection;

class VillageExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
 
        return ElectionSurvey::all();
    }
}
