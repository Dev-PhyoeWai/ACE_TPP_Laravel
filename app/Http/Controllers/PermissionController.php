<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    protected $permissionRepository;
    public function __construct(PermissionRepository $permissionRepository){
        $this->permissionRepository = $permissionRepository;
    }
    public function index(){
        $permissions = $this->permissionRepository->getAll();
        return view('role-permission.permission.index',
            compact('permissions'));
    }
    public function create(){
        return view('role-permission.permission.create');
    }
    public function store(PermissionRequest $request){
        $this->permissionRepository->create([
            'name' => $request->name,
        ]);
        return redirect('permissions')->with('success','Permission created successfully');
    }
    public function edit($id){
        $permission = $this->permissionRepository->getId($id);
        return view('role-permission.permission.edit',[
            'permission' => $permission
        ]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,' . $id, // ignore
            ]
        ]);
        // $permission->update([
        //     'name' => $request->name,
        // ]);
        $this->permissionRepository->update([
            'name' => $request->name,
        ], $id);
        return redirect('permissions')->with('success','Permission updated successfully');
    }
    public function destroy($permissionId){
        $this->permissionRepository->delete($permissionId);
        return redirect('permissions')->with('success','Permission deleted successfully');
    }
}
