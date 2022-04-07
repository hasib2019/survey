<!-- <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
// use App\Http\Controllers\Controller;
use Codedge\Fpdf\Fpdf\Fpdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
        $pdf = PDF::loadView('myPDF', $data);
        // $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'NikoshBAN'])->loadView('myPDF', compact('data'));
        // $pdf->setPaper('A4', 'landscape');
        // return $pdf->stream('All Beneficiaries.pdf');

        $pdf = PDF::loadView('myPDF', compact('data'));
        $pdf->setOptions(['enable_javascript', true])->setOptions(['javascript-delay', 13500])->save(public_path('invoice.pdf'));
        // return $pdf->download('All Beneficiaries.pdf');
    }

   
} -->
