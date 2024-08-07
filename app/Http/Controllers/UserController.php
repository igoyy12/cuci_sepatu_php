<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mechanic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('users.index', ['users' => $users]);
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
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'admin',
            'password' => Hash::make($request->password)
        ];
        
        User::create($data);
        return to_route('users')->with(['message' => 'Admin baru berhasil ditambahkan']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        User::where('id', $request->id)->delete();
        return to_route('users')->with(['message' => 'Admin '.$request->name.' berhasil dihapus']);
    }

    public function mechanic()
    {
        $mechanics = Mechanic::get();
        return view('mechanics.index', ['mechanics' => $mechanics]);
    }

    public function destroyMechanic(Request $request)
    {
        //
        Mechanic::where('id_mechanic', $request->id)->delete();
        return to_route('mechanics')->with(['message' => 'cleaners '.$request->name.' berhasil dihapus']);
    }

    public function storeMechanic(Request $request)
    {
        $data = [
            'nama' => $request->name,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
        ];

        $id_mechanic = $request->id_mechanic;

        if($id_mechanic){
            Mechanic::where('id_mechanic', $id_mechanic)->update($data);
            $msg = 'Data cleaners berhasil diperbaharui';
        }else{
            Mechanic::create($data);
            $msg = 'cleaners baru berhasil ditambahkan';
        }
        
        
        return to_route('mechanics')->with(['message' => $msg]);

    }
}
