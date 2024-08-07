<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Mechanic;
use App\Models\Vehicle;
use App\Models\UserRole;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Booking::getL();

        $booking = Booking::with(['vehicle', 'mechanic'])->orderBy('created_at',  'desc')->paginate(10);
        $mechanic = Mechanic::with('booking')->get();
        return view('booking.index', ['booking' => $booking, 'mechanic' => $mechanic]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $phone=$request->input('phone');

        $booking_date = $request->input('booking_date');
        $data = [
            'start_time' => $booking_date.' '.$request->input('start_time'),
            'end_time' => $booking_date.' '.$request->input('end_time'),
            'id_mechanic' => $request->input('id_mechanic'),
            'status' => 'onprocess',
        ];

        $booking->where('id_booking', $request->input('id_booking'))
        ->update($data);

        // $token ='';
        $token = 'E3!gGG!v8Fxg6P#vzxmN';

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'target' => $phone,
        'message' => 'Booking servis anda akan dikerjakan pada '.$booking_date.' jam '.$request->input('start_time').' silakan datang ke bengkel sebelum jam tersebut.',
        ),
        CURLOPT_HTTPHEADER => array(
            "Authorization: $token"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if (isset($response->detail)) {
            echo $response->detail;
        } else {
            echo 'Detail tidak tersedia';
        }
        if($response->status === true){
            return to_route('booking')->with(['message' => 'Booking berhasil diproses']);   
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function doneService(Request $request, Booking $booking)
    {
        $booking->where('id_booking', $request->input('id_booking'))
        ->update(['status' => 'done']);

        return to_route('booking')->with(['message' => 'Pelayanan telah selesai']);
    }
}
