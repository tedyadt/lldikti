<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use App\Http\Requests\StoreLembagaRequest;
use App\Http\Requests\UpdateLembagaRequest;
use Yajra\Datatables\Datatables;

class LembagaController extends Controller
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
    public function store(StoreLembagaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lembaga $lembaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lembaga $lembaga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLembagaRequest $request, Lembaga $lembaga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lembaga $lembaga)
    {
        //
    }

    public function getlembagabyidjson($id){
        $lembagaById = Lembaga::select([
            'id',
            'lembaga_nama',
            'lembaga_nama_singkat',
            'lembaga_logo',
            'lembaga_status'
        ])->where('id', '=', $id)->get(); // Menggunakan get() untuk mengambil hasil dari kueri
    
        if ($lembagaById->isEmpty()) {
            return response()->json([]); // Mengembalikan array kosong jika tidak ada data
        }
    
        return Datatables::of($lembagaById)->make(true);
    }
}