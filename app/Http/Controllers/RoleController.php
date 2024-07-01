<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    protected $roleRepository;
    public function __construct(RoleRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }
    public function index(){
        $roles = $this->roleRepository->getAll();
        return view('role-permission.role.index',[ // compact data to index.blade
            'roles' => $roles
        ]);
    }
    public function create(){
        return view('role-permission.role.create');
    }
    public function store(RoleRequest $request){
        $this->roleRepository->create([
            'name' => $request->name,
        ]);
        return redirect('roles')->with('success','Role created successfully');
    }
    public function edit($id){
        $role = $this->roleRepository->getId($id);
        return view('role-permission.role.edit',[
            'role' => $role
        ]);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,' . $id, // ignore
            ]
        ]);
        $this->roleRepository->update([
            'name' => $request->name,
        ],$id);
        return redirect('roles')->with('success','Role updated successfully');
    }
    public function destroy($id){
        $this->roleRepository->delete($id);
        return redirect('roles')->with('success','Role deleted successfully');
    }

    public function addPermissionToRole($id)
    {
        //        $permissions = Permission::get();
        //        $role = Role::findOrFail($roleId);
        //        $rolePermissions = DB::table("role_has_permissions")
        //            ->where('role_has_permissions.role_id', $roleId)
        //            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        //            ->all();
        $permissions = Permission::all();
        $role = $this->roleRepository->getId($id);

        $rolePermissions = $role->permissions ?
            $role->permissions->pluck('id')->toArray() : [];

        return view('role-permission.role.add-permissions',
            compact('role', 'permissions', 'rolePermissions'));
    }
    public function givePermissionToRole(Request $request , $roleId)
    {
        $request->validate([
            'permission' => 'required|array'
        ]);
        $permissions = $request->input('permission');
        $role = $this->roleRepository->getId($roleId);
        $permissionIdsOrNames = Permission::whereIn('id', $permissions)->orWhereIn('name', $permissions)->pluck('id')->toArray();

        $role->syncPermissions($permissionIdsOrNames);
        return redirect()->back()->with('success','Permission added to role successfully');
    }
}
