<?php
namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository = $userRepository;
    }
    public function index(){
        $users = $this->userRepository->getAll();
        $roles = Role::pluck('name', 'name')->all();
        return view('role-permission.user.index', compact(['users', 'roles']));
    }
    public function create(){
        return view('role-permission.user.index');
    }
    public function store(UserRequest $request){
        $user = $this->userRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        $user->syncRoles($request->roles);
        return redirect('/users')->with('success', 'User Created Successfully');
    }
    public function edit($id){
        $user = $this->userRepository->getId($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('role-permission.user.edit', compact(['user','roles','userRole']));
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if (!empty($request->password)) {
            $data['password'] = $request->password;
        }
        $user = $this->userRepository->update($data, $id);
        $user->syncRoles($request->roles);
        return redirect('/users')->with('success', 'User Updated Successfully with that roles');
    }
    public function destroy($userID){
        $this->userRepository->delete($userID);
        return redirect('/users')->with('success', 'User Deleted Successfully');
    }

}
