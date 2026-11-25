<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function export()
    {
        $events = Event::with('category')->orderBy('date')->get();
        $pdf = Pdf::loadView('pdf.events', compact('events'));

        return $pdf->download('mini-agenda.pdf');
    }
}
