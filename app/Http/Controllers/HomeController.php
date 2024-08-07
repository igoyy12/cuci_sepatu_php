<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Booking;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home.index');
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
        try {
            $vehicle = Vehicle::where('nopol', $request->input('nopol'))->first();
            if(!$vehicle){
                $dataCust = [
                    'nama' => $request->input('name'),
                    'telp' => $request->input('handphone'),
                ];
    
                $saveCust = Customer::create($dataCust);
    
                $dataVehicle = [
                    'nopol' => $request->input('nopol'),
                    'merk' => $request->input('merk'),
                    'user_id' => $saveCust->id,
                    'qty' => $request->input('qty'),
                ];
    
                $saveVehicle = Vehicle::create($dataVehicle);
            }else{
                $vehicle= Vehicle::where('nopol', $request->input('nopol'))->first();
                Customer::where('id_cust', $vehicle->user_id)->update(['telp' => $request->input('handphone')]);
            }

            $dataBooking = [
                'nopol' => $request->input('nopol'),
                'booking_date' => $request->input('booking_date'),
                'desc' => $request->input('desc'),
            ];

            $saveBooking = Booking::create($dataBooking);



            return to_route('home')->with(['message' => 'Booking berhasil. Konfirmasi ketersediaan jam servis akan dikirim melalui Whatsapp']);
        } catch (Throwable $e) {
            report($e);
     
            return false;
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }

    public function getVehicleWithUser(string $nopol){
        $vehicle = Vehicle::where('nopol', $nopol)->with('customer')->first();
        return response()->json(['data' => $vehicle]);
    }
}
