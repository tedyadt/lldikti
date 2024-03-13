<?php

namespace App\Http\Controllers;

use App\Models\PeringkatAkreditasi;
use App\Http\Requests\StorePeringkatAkreditasiRequest;
use App\Http\Requests\UpdatePeringkatAkreditasiRequest;
use Yajra\Datatables\Datatables;

class PeringkatAkreditasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePeringkatAkreditasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PeringkatAkreditasi $peringkatAkreditasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PeringkatAkreditasi $peringkatAkreditasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeringkatAkreditasiRequest $request, PeringkatAkreditasi $peringkatAkreditasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeringkatAkreditasi $peringkatAkreditasi)
    {
        //
    }

    public function getperingkatakreditasibyidjson($id){
        $peringkatAkreditasiById = PeringkatAkreditasi::select([
            'id',
            'peringkat_nama',
            'peringkat_logo',
        ])->where('id', '=', $id)->get(); // Menggunakan get() untuk mengambil hasil dari kueri
    
        if ($peringkatAkreditasiById->isEmpty()) {
            return response()->json([]); // Mengembalikan array kosong jika tidak ada data
        }
    
        return Datatables::of($peringkatAkreditasiById)->make(true);
    }

}
