<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{
    public function download($id) {
        
 $order=Order::find($id);

        $pdf = Pdf::loadView('admin.pages.pdf',compact('order'));
     
        return $pdf->download();
    }
}
