<?php

namespace App\Http\Controllers;

use App\Models\PimpinanPerti;
use App\Http\Requests\StorePimpinanPertiRequest;
use App\Http\Requests\UpdatePimpinanPertiRequest;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Gate;
use App\Models\Jabatan;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;


class PimpinanPertiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('access_pimpinan_perguruan_tinggi'), 403);
        return view('perguruan_tinggi.pimpinan_perti.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('input_pimpinan_perguruan_tinggi'), 403);
        $jabatan_s = Jabatan::select([
            'id', 'jabatan_nama'
        ])->get();
        return view('perguruan_tinggi.pimpinan_perti.create',    [
            'jabatan_s' => $jabatan_s
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePimpinanPertiRequest $request)
    {
        
            abort_if(Gate::denies('input_pimpinan_perguruan_tinggi'), 403);
            try{
                $validatedDataAgreement = $request->validate([
                    'agreement' => 'required',
                    'id_user' => 'required|exists:users,id'
                ]);
                $id_user = $validatedDataAgreement['id_user'];
    
                $validatedDataPimpinanPerti = $request->validate([

                    'pimpinan_nama' => 'required|string',
                    'pimpinan_tgl_awal' => 'required|date',
                    
                ]);  

                $validatedDataJabatan = $request->validate([
                   
                    'jabatan_nama' => 'required|string',
                
                ]);  

                $pimpinanPertiGuid = Uuid::uuid4()->toString();
                $jabatanGuid = Uuid::uuid4()->toString();
                $validatedDataPimpinanPerti['id'] = $pimpinanPertiGuid; 
                $validatedDataJaba['id'] = $jabatanGuid; 
                $validatedDataPimpinanPerti['id_user'] = $id_user;
                $validatedDataJabatan['id_user'] = $id_user;
    
    
                DB::beginTransaction();
                try{
    
                    Jabatan::create($validatedDataJabatan);
                    PimpinanPerti::create($validatedDataPimpinanPerti);
                    
    
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

   
    public function show(PimpinanPerti $pimpinanPerti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PimpinanPerti $pimpinanPerti)
    {
        abort_if(Gate::denies('edit_pimpinan_perguruan_tinggi'), 403);
        return view('pimpinan_perti.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePimpinanPertiRequest $request, PimpinanPerti $pimpinanPerti)
    {
        abort_if(Gate::denies('edit_pimpinan_perguruan_tinggi'), 403);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PimpinanPerti $pimpinanPerti)
    {
        //
    }

    public function pimpinanpertibyidpertijson($id_perti){
        $pimpinanPerti = PimpinanPerti::select([
            'pimpinan_pertis.id',
            'pimpinan_pertis.pimpinan_nama',
            'pimpinan_pertis.pimpinan_tgl_awal',
            'jabatans.jabatan_nama',
            
        ])->join('jabatans' , 'pimpinan_pertis.fk_jabatan_guid' , '=' , 'jabatans.id')
        ->where('pimpinan_pertis.fk_perti_guid' , '=' , $id_perti)
        ->get();
    
        return Datatables::of($pimpinanPerti)->make(true);
    }
}
