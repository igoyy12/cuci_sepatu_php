<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Booking;
use App\Models\Mechanic;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $booking = Booking::with(['vehicle', 'mechanic'])->paginate(10);
        $mechanic = Mechanic::with('booking')->get();
        return view('report.index', ['booking' => $booking, 'mechanic' => $mechanic]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function print()
    {

        $booking = Booking::with(['vehicle', 'mechanic'])->get();
        $mechanic = Mechanic::with('booking')->get();
        $pdf = Pdf::loadView('report.print', ['booking' => $booking, 'mechanic' => $mechanic])->setPaper('a4', 'landscape');
        return $pdf->download('invoice.pdf');    
    }
}
