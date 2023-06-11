<?php

namespace App\Http\Controllers;

use App\Models\bill;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController
{
    function viewpdf($request)
    {
        $tran=bill::where('id', $request)->first();
        return view('recepit', compact('tran'));
    }

    function dopdf($request)
    {
        $tran=bill::where('id', $request)->first();
        $pdf = PDF::loadView('recepit1', compact('tran'));
        return $pdf->download('receipt.pdf');
    }

}
