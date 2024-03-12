<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  view('user_manajemen.role.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::select([
            'id',
            'name'
        ])->orderBy('id', 'asc')->get();

        return view('user_manajemen.role.create', [
            'permissions' => $permissions
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        try{
            // dd($request);
            $validatedData = $request->validate([
                'name' => 'required|string',
                'permissions' => 'required|array|min:1', // Setidaknya satu elemen dalam array diperlukan
                'permissions' => 'exists:permissions,name', // Pastikan semua nilai dalam array ada di tabel permissions
            ]);

            $role = Role::create([
                'name' => $request->name,
                'guard_name' => 'web'
            ]);

            $role->givePermissionTo($request->permissions);

        }catch(\Exception $e){
            dd($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }

    // public function rolejson(){
    //     $roles = Role::select('roles.id as id', 'roles.name as role_name', 'permissions.name as permission_name', 'role_has_permissions.*')
    //     ->join('role_has_permissions', 'roles.id', '=', 'role_has_permissions.role_id')
    //     ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
    //     ->get();

    //     return Datatables::of($roles)->make(true);
    // }
    public function rolejson(){
        $roles = Role::select('roles.id as id', 'roles.name as role_name');

        return Datatables::of($roles)->make(true);
    }

}
