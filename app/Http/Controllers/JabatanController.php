<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use Illuminate\Support\Facades\Gate;
use Yajra\Datatables\Datatables;
use Ramsey\Uuid\Uuid;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('access_data_jabatan'), 403);
        return view('master.jabatan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('input_data_jabatan'), 403);
        return view('master.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJabatanRequest $request)
    {
        abort_if(Gate::denies('input_data_jabatan'), 403);
        try {
            
            $validatedDataJabatan = $request->validate([
                'jabatan_nama' => 'required|string',
                
            ]);

            $jabatanGuid = Uuid::uuid4()->toString();
            $validatedDataJabatan['id'] = $jabatanGuid; 
            
            
            Jabatan::create($validatedDataJabatan);
            dd('Success');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJabatanRequest $request, Jabatan $jabatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        //
    }

    public function jabatanjson(){
        $jabatan = Jabatan::select([
            'id',
            'jabatan_nama'
        ]);

        return Datatables::of($jabatan)->make(true);
    }
}
