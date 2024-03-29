<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use App\Http\Requests\StoreLembagaRequest;
use App\Http\Requests\UpdateLembagaRequest;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Gate;

class LembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  view('master.lembaga_akreditasi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('master.lembaga_akreditasi.create');    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLembagaRequest $request)
    {
        try {
            $validatedData = $request->validate([
                'lembaga_nama' => 'required|string',
                'lembaga_nama_singkat' => 'required|string',
                'lembaga_status' => 'required|in:Aktif,Tidak Aktif',
                'lembaga_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            if ($request->hasFile('lembaga_logo')) {
                $filenameSimpan = $this->generateFilename($request->file('lembaga_logo')->getClientOriginalExtension(),'logo'.$request->lembaga_nama_singkat, rand(0,100));
                $path = $request->file('lembaga_logo')->storeAs('public/lembaga_akreditasi', $filenameSimpan);
                $validatedData['lembaga_logo'] = $filenameSimpan;
            }
            Lembaga::create($validatedData);
            dd('Success');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lembaga $lembaga)
    {
        abort_if(Gate::denies('show_data_lembaga_akreditasi'), 403);
        // dd($lembaga);
        return view('master.lembaga_akreditasi.detail',[
            'lembaga' => $lembaga
        ]);
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

    public function getlembagaakreditasibyidjson($id){
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

    public function lembagaakreditasijson(){
        $lembagaAkreditasi = Lembaga::select([
            'id',
            'lembaga_nama',
            'lembaga_nama_singkat',
            'lembaga_logo',
            'lembaga_status'
        ]);
    
        return Datatables::of($lembagaAkreditasi)->make(true);
    }
}
