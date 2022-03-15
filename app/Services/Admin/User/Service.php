<?php


namespace App\Services\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Service
{
    public function store($data)
    {
        $role = $data['role_name'] ?? '';
        unset($data['role_name']);
        $data['password'] = Hash::make($data['password']);
        $user = User::firstOrCreate($data);
        if (!empty($role)){
            $user->assignRole($role);
        }
    }

    public function update(User $user, $data)
    {
        $role = $data['role_name'] ?? '';
        unset($data['role_name']);
        $user->update($data);
        $user->syncRoles($role);
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}
