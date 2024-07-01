<?php
namespace App\Repositories;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface{
    protected $user;
    public function __construct(User $user){
        $this->user = $user;
    }

    public function getAll() {
        return $this->user->all();
    }

    public function getId($id) {
        return $this->user->find($id);
    }

    public function create(array $data) {
        $data['password'] = Hash::make($data['password']);
        return $this->user->create($data);
    }

    public function update(array $data, $id) {
        $user = $this->getId($id);
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        return $user;
    }

    public function delete($id) {
        $user = $this->getId($id);
        $user->delete();
    }
}
