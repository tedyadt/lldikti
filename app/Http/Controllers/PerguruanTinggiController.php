<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use App\Models\AkreditasiPerti;
use App\Models\PerguruanTinggi;
use Yajra\Datatables\Datatables;
use App\Models\BadanPenyelenggara;
use Illuminate\Support\Facades\DB;
use App\Models\PeringkatAkreditasi;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePerguruanTinggiRequest;
use App\Http\Requests\UpdatePerguruanTinggiRequest;
use Ramsey\Uuid\Uuid;

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
        $lembaga_s = Lembaga::select([
            'id', 'lembaga_nama', 'lembaga_nama_singkat', 'lembaga_logo'
        ])->get();
        $peringkat_s = PeringkatAkreditasi::select([
            'id', 'peringkat_nama', 'peringkat_logo'
        ])->get();
        $badanPenyelenggara_s = BadanPenyelenggara::select([
            'id', 'bp_nama', 'bp_status', 'bp_logo'
        ])->get();

        return view('perguruan_tinggi.create', [
            'lembaga_s' => $lembaga_s,
            'peringkat_s' => $peringkat_s,
            'badanPenyelenggara_s' => $badanPenyelenggara_s
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerguruanTinggiRequest $request)
    {
        abort_if(Gate::denies('create_data_perguruan_tinggi'), 403);
        try{
            $validatedDataAgreement = $request->validate([
                'agreement' => 'required',
                'id_user' => 'required|exists:users,id'
            ]);
            $id_user = $validatedDataAgreement['id_user'];

            $validatedDataPerti = $request->validate([
                'perti_kode' => 'required|numeric|unique:perguruan_tinggis,perti_kode',
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
                'fk_bp_guid' =>'required|string|exists:badan_penyelenggaras,id',
                'perti_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);  
            $pertiGuid = Uuid::uuid4()->toString();
            $validatedDataPerti['id'] = $pertiGuid; 
            $validatedDataPerti['id_user'] = $id_user;


            $validatedDataAkreditasi = $request->validate([
                'akeditasi_pt_sk' => 'required|string',
                'akreditasi_pt_tgl_sk' => 'string|date',
                'akreditasi_pt_tgl_akhir' => 'string|date',
                'akreditasi_pt_status' => 'string|required|in:Aktif,Berakhir',
                'fk_lembaga_id' => 'required|string|exists:lembagas,id',
                'fk_peringkat_id' => 'required|string|exists:peringkat_akreditasis,id'
            ]);
            $akreditasiPertiGuid = Uuid::uuid4()->toString();
            $validatedDataAkreditasi['id'] = $akreditasiPertiGuid; 
            $validatedDataAkreditasi['fk_perti_guid'] = $pertiGuid; 
            $validatedDataAkreditasi['id_user'] = $id_user;


            // dd($validatedDataAkreditasiPerti);
            

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
            'perti_kode',
            'perti_nama',
            'perti_status',
            'perti_kota',
            'keterangan'
        ]);

        return Datatables::of($perguruanTinggi)->make(true);
    }
}
