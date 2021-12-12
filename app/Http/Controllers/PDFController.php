<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
        // $pdf = PDF::loadView('myPDF', $data);
        $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Kalpurush'])->loadView('myPDF', compact('data'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('All Beneficiaries.pdf');
        // return $pdf->download('All Beneficiaries.pdf');
    }
}
