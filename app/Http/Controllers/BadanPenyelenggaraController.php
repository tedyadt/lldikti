<?php

namespace App\Http\Controllers;

use App\Models\Akta;
use App\Models\Kumham;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;
use App\Models\BadanPenyelenggara;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreBadanPenyelenggaraRequest;
use App\Http\Requests\UpdateBadanPenyelenggaraRequest;
use Ramsey\Uuid\Uuid;

class BadanPenyelenggaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('access_data_badan_penyelenggara'), 403);
        return view('badan_penyelenggara.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('create_data_badan_penyelenggara'), 403);
        
        return view('badan_penyelenggara.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBadanPenyelenggaraRequest $request)
    {
        abort_if(Gate::denies('create_data_badan_penyelenggara'), 403);

        try{
            $validatedDataAgreement = $request->validate([
                'agreement' => 'required',
                'id_user' => 'required|exists:users,id'
            ]);
            $id_user = $validatedDataAgreement['id_user'];
            
            $validatedDataBP = $request->validate([
                'bp_nama' => 'required|string',
                'bp_alamat' => 'required|string',
                'bp_email' => 'required|email|unique:badan_penyelenggaras,bp_email',
                'bp_telp' => 'required|numeric|unique:badan_penyelenggaras,bp_telp',
                'bp_status' => 'required|in:Aktif,Tidak Aktif',
                'bp_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $bpGuid = Uuid::uuid4()->toString();
            $validatedDataBP['id'] = $bpGuid;
            $validatedDataBP['id_user'] = $id_user;
            $filenameSimpanBP = $this->generateFilename($request->file('bp_logo')->getClientOriginalExtension(), 'Logo_BP', $bpGuid);
            $validatedDataBP['bp_logo'] = $filenameSimpanBP;

            $validatedDataAkta = $request->validate([
                'akta_nomor' => 'required|string|unique:aktas,akta_nomor',
                'akta_tgl' => 'required|date',
                'akta_nama_notaris' => 'required|string',
                'akta_kota_notaris' => 'required|string',
                'akta_status' => 'required|in:Aktif,Tidak Aktif',
                'akta_jenis' => 'required|in:Aktif,Tidak Aktif',
                'akta_dokumen' => 'required|mimes:pdf|max:2048'
            ]);
            $aktaGuid = Uuid::uuid4()->toString();
            $validatedDataAkta['id'] = $aktaGuid;
            $validatedDataAkta['fk_bp_guid'] = $bpGuid;
            $validatedDataAkta['id_user'] = $id_user;
            $filenameSimpanAkta = $this->generateFilename($request->file('akta_dokumen')->getClientOriginalExtension(),'Akta_Dokumen', $aktaGuid);
            $validatedDataAkta['akta_dokumen'] = $filenameSimpanAkta;

            // dd($validatedDataBP);

            $filenameSimpanKumham = '';
            if(request('buat_sk_kumham') == 'on'){
                $validatedDataKumham = $request->validate([
                    "kumham_sk" => "required|string|unique:kumhams,kumham_sk,",
                    "kumham_tgl_sk" => "required|date",
                    "kumham_jenis" => "required|string",
                    'kumham_dokumen' => 'required|mimes:pdf|max:2048'
                ]);
                $kumhamGuid = Uuid::uuid4()->toString();
                $validatedDataKumham["id"] = $kumhamGuid;
                $validatedDataKumham['fk_akta_guid'] = $aktaGuid;
                $validatedDataKumham['id_user'] = $id_user;
                $filenameSimpanKumham = $this->generateFilename($request->file('kumham_dokumen')->getClientOriginalExtension(),'Kumham', $kumhamGuid);
                $validatedDataKumham['kumham_dokumen'] = $filenameSimpanKumham;
            }

            //store file
            DB::transaction(function () use ($request, $filenameSimpanBP, $filenameSimpanAkta, $filenameSimpanKumham) {
                if ($request->hasFile('bp_logo')) { 
                    $storeBP = $request->file('bp_logo')->storeAs('public/badan_penyelenggara/logo/', $filenameSimpanBP);
                }
    
                if ($request->hasFile('akta_dokumen')) {
                    $storeAkta = $request->file('akta_dokumen')->storeAs('public/badan_penyelenggara/akta/', $filenameSimpanAkta);
                }
    
                if ($request->hasFile('kumham_dokumen') && request('buat_sk_kumham') == 'on') {                   
                    $storeKumham = $request->file('kumham_dokumen')->storeAs('public/badan_penyelenggara/kumham/', $filenameSimpanKumham);
                }
            });
            
            //store
            DB::beginTransaction();
            try{
                
                BadanPenyelenggara::create($validatedDataBP);
                Akta::create($validatedDataAkta);
                if(request('buat_sk_kumham') == 'on'){
                    Kumham::create($validatedDataKumham);
                }

                // Commit transaksi jika semua operasi berhasil
                DB::commit();

                dd('sukses');

            }catch(\Exception $e){
                DB::rollback();

                dd('terjadi kesalahan saat store ke db '. $e->getMessage());
            }

        }catch(\Exception $e){
            dd($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(BadanPenyelenggara $badanPenyelenggara)
    {
        abort_if(Gate::denies('show_data_badan_penyelenggara'), 403);

        try{
            $badanPenyelenggara_detail = BadanPenyelenggara::select([
                'bp_email', 'bp_alamat', 'bp_status', 'bp_logo', 'bp_nama', 'bp_telp',
    
                'aktas.akta_nomor', 'aktas.akta_tgl', 'aktas.akta_status', 'aktas.akta_dokumen', 
    
                'kumhams.kumham_tgl_sk', 'kumhams.kumham_sk', 'kumhams.kumham_jenis', 'kumhams.kumham_dokumen'
            ])->join('aktas', 'aktas.fk_bp_guid', '=', 'badan_penyelenggaras.id')
              ->join('kumhams', 'kumhams.fk_akta_guid', '=', 'aktas.id')
              ->first();
    
            return view('badan_penyelenggara.detail', [
                'bp' => $badanPenyelenggara_detail,
            ]);    
        }catch(\Exception $e){
            dd($e->getMessage());
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BadanPenyelenggara $badanPenyelenggara)
    {
        abort_if(Gate::denies('edit_data_badan_penyelenggara'), 403);

        return view('badan_penyelenggara.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBadanPenyelenggaraRequest $request, BadanPenyelenggara $badanPenyelenggara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BadanPenyelenggara $badanPenyelenggara)
    {
        //
    }

    public function badanpenyelenggarajson(){
        $badanPenyelenggara = BadanPenyelenggara::select([
            'id',
            'bp_nama',
            'bp_status'
        ]);

        return Datatables::of($badanPenyelenggara)->make(true);

    }

    public function getbadanpenyelenggarabyidjson($id) {
        $badanPenyelenggaraById = BadanPenyelenggara::select([
            'id',
            'bp_nama',
            'bp_status',
            'bp_logo'
        ])->where('id', '=', $id)->get(); // Menggunakan get() untuk mengambil hasil dari kueri
    
        if ($badanPenyelenggaraById->isEmpty()) {
            return response()->json([]); // Mengembalikan array kosong jika tidak ada data
        }
    
        return Datatables::of($badanPenyelenggaraById)->make(true);
    }
}
