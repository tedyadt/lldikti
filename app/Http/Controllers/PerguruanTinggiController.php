<?php

namespace App\Http\Controllers;

use App\Models\PerguruanTinggi;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePerguruanTinggiRequest;
use App\Http\Requests\UpdatePerguruanTinggiRequest;
use App\Models\AkreditasiPerti;

class PerguruanTinggiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('access_data_perguruan_tinggi'), 403);
        return view('perguruan_tinggi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('create_data_perguruan_tinggi'), 403);
        return view('perguruan_tinggi.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerguruanTinggiRequest $request)
    {
        abort_if(Gate::denies('create_data_perguruan_tinggi'), 403);
        try{
            // dd($request);
            $validatedDataPerti = $request->validate([
                'perti_nama' => 'required|string',
                'perti_nama_singkat' => 'required|string',
                'perti_sk_pendirian' => 'required|string',
                'perti_tgl_sk_pendirian' => 'required|date',
                'perti_kota' => 'required|string',
                'perti_alamat' => 'required|string',
                'perti_email' => 'required|email',
                'perti_telp' =>'required|string',
                'perti_website' => 'required|string',
                'perti_status' =>'required|string|in:Aktif,Pembinaan,Alih Bentuk,Alih Kelola,Tutup',
                'keterangan' =>'required|string',
                'id_bp' =>'required|string|exists:badan_penyelenggaras,id',
                'perti_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);  

            $validatedDataAkreditasi = $request->validate([
                'akeditasi_pt_sk' => 'required|string',
                'akreditasi_pt_tgl_sk' => 'string|date',
                'akreditasi_pt_tgl_akhir' => 'string|date',
                'akreditasi_pt_status' => 'string|required|in:Aktif,Berakhir',
                'id_lembaga' => 'required|string|exists:lembagas,id',
                'id_peringkat_akreditasi' => 'required|string|exists:peringkat_akreditasis,id'
            ]);
            // dd($validatedDataAkreditasi);
            if ($request->hasFile('perti_logo')) {
                $filenameWithExt = $request->file('perti_logo')->getClientOriginalName(); $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('perti_logo')->getClientOriginalExtension(); $filenameSimpan = $filename.'_'.time().'.'.$extension;
                $path = $request->file('perti_logo')->storeAs('public/perguruan_tinggi', $filenameSimpan);
                $validatedDataBP['perti_logo'] = $filenameWithExt;
            }

            $validatedDataPerti['perti_logo'] = $filenameSimpan;

            DB::beginTransaction();
            try{

                PerguruanTinggi::create($validatedDataPerti);
                AkreditasiPerti::create($validatedDataAkreditasi);

                DB::commit();

                dd('sukses');

            }catch(\Exception $e){
                DB::rollback();

                dd('terjadi kesalahan saat store ke db '. $e->getMessage());
            }

        }catch(\Exception $e){
            dd( $e->getMessage() );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PerguruanTinggi $perguruanTinggi)
    {
        abort_if(Gate::denies('show_data_perguruan_tinggi'), 403);
        return view('perguruan_tinggi.detail',[
            'perti' => $perguruanTinggi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerguruanTinggi $perguruanTinggi)
    {
        abort_if(Gate::denies(''), 403);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerguruanTinggiRequest $request, PerguruanTinggi $perguruanTinggi)
    {
        abort_if(Gate::denies(''), 403);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerguruanTinggi $perguruanTinggi)
    {

    }

    public function perguruantinggijson(){
        $perguruanTinggi = PerguruanTinggi::select([
            'id',
            'perti_nama',
            'perti_status',
            'perti_kota',
            'keterangan'
        ]);

        return Datatables::of($perguruanTinggi)->make(true);
    }
}
