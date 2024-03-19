<?php

namespace App\Http\Controllers;

use App\Models\PeringkatAkreditasi;
use App\Http\Requests\StorePeringkatAkreditasiRequest;
use App\Http\Requests\UpdatePeringkatAkreditasiRequest;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Gate;

class PeringkatAkreditasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  view('master.peringkat_akreditasi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('master.peringkat_akreditasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePeringkatAkreditasiRequest $request)
    {
        // dd($request);

        try {
            $validatedData = $request->validate([
                'peringkat_nama' => 'required|string',
                'peringkat_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            
            if ($request->hasFile('peringkat_logo')) {
                $filenameSimpan = $this->generateFilename( $request->file('peringkat_logo')->getClientOriginalExtension(), 'logo_'.$request->peringkat_nama, rand(0,100));
                $path = $request->file('peringkat_logo')->storeAs('public/peringkat_akreditasi', $filenameSimpan);
                $validatedData['peringkat_logo'] = $filenameSimpan;
            }
            PeringkatAkreditasi::create($validatedData);
            dd('Success');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(PeringkatAkreditasi $peringkatAkreditasi)
    {
        abort_if(Gate::denies('show_data_peringkat_akreditasi'), 403);
        return view('master.peringkat_akreditasi.detail',[
            'peringkat' => $peringkatAkreditasi
        ]);
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

    public function peringkatakreditasijson(){
        $peringkatAkreditasi = PeringkatAkreditasi::select([
            'id',
            'peringkat_nama',
            'peringkat_logo',
        ]);
    
        return Datatables::of($peringkatAkreditasi)->make(true);
    }

}
