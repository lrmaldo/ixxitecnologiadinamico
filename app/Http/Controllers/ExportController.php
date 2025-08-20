<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function servicesPdf(Request $request)
    {
        $ids = collect(explode(',', (string) $request->get('ids')))->filter()->map('intval');
        $services = Service::whereIn('id', $ids)->get();
        $pdf = Pdf::loadView('pdf.services', compact('services'));
        return $pdf->download('ixxi-servicios.pdf');
    }
}
