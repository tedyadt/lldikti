<?php

namespace App\Http\Controllers;

use App\Models\Akta;
use Yajra\Datatables\Datatables;
use App\Models\BadanPenyelenggara;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreBadanPenyelenggaraRequest;
use App\Http\Requests\UpdateBadanPenyelenggaraRequest;
use App\Models\Kumham;

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
            // dd($request);

            $validatedDataBP = $request->validate([
                'bp_nama' => 'required|string',
                'bp_alamat' => 'required|string',
                'bp_kontak' => 'required|string',
                'bp_status' => 'required|in:Aktif,Tidak Aktif',
                'bp_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $validatedDataAkta = $request->validate([
                'akta_nomor' => 'required|string|unique:aktas,akta_nomor',
                'akta_tgl' => 'required|date',
                'akta_nama_notaris' => 'required|string',
                'akta_kota_notaris' => 'required|string',
                'akta_status' => 'required|in:Aktif,Tidak Aktif',
                'akta_jenis' => 'required|in:Aktif,Tidak Aktif',
                'akta_dokumen' => 'required|mimes:pdf|max:2048'
            ]);


            if(request('buat_sk_kumham') == 'on'){
                $validatedDataKumham = $request->validate([
                    "kumham_sk" => "required|string|unique:kumhams,kumham_sk,",
                    "kumham_tgl_sk" => "required|date",
                    "kumham_jenis" => "required|string",
                    'kumham_dokumen' => 'required|mimes:pdf|max:2048'
                ]);
            }

            //store file
            DB::transaction(function () use ($request) {
                if ($request->hasFile('bp_logo')) {
                    $filenameWithExt = $request->file('bp_logo')->getClientOriginalName(); $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('bp_logo')->getClientOriginalExtension(); $filenameSimpan = $filename.'_'.time().'.'.$extension;
                    $path = $request->file('bp_logo')->storeAs('public/badan_penyelenggara', $filenameSimpan);
                    $validatedDataBP['bp_logo'] = $filenameSimpan;
                }
    
                if ($request->hasFile('akta_dokumen')) {
                    $filenameWithExt = $request->file('akta_dokumen')->getClientOriginalName(); $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('akta_dokumen')->getClientOriginalExtension(); $filenameSimpan = $filename.'_'.time().'.'.$extension;
                    $path = $request->file('akta_dokumen')->storeAs('public/badan_penyelenggara', $filenameSimpan);
                    $validatedDataAkta['akta_dokumen'] = $filenameSimpan;
                }
    
                if ($request->hasFile('kumham_dokumen') && request('buat_sk_kumham') == 'on') {
                    $filenameWithExt = $request->file('kumham_dokumen')->getClientOriginalName(); $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('kumham_dokumen')->getClientOriginalExtension(); $filenameSimpan = $filename.'_'.time().'.'.$extension;
                    $path = $request->file('kumham_dokumen')->storeAs('public/badan_penyelenggara', $filenameSimpan);
                    $validatedDataKumham['kumham_dokumen'] = $filenameSimpan;
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

        return view('badan_penyelenggara.detail', [
            'bp' => $badanPenyelenggara,
        ]);
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
