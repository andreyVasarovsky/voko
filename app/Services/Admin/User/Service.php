<?php


namespace App\Services\Admin\User;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
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
        event(new Registered($user));
    }

    public function update(User $user, $data)
    {
        $role = $data['role_name'] ?? '';
        unset($data['role_name']);
        $user->update($data);
        $user->syncRoles($role);
    }

    public function delete(User $user): array
    {
        if ($user->articles->count() > 0) {
            return [
                'status' => false,
                'msg' => 'Нельзя удалять пользователя у которого есть написанные статьи!'
            ];
        }
        if ($user->comments->count() > 0){
            return [
                'status' => false,
                'msg' => 'Нельзя удалять пользователя у которого есть комментарии!'
            ];
        }

        $user->delete();

        return ['status' => true, 'msg' => ''];
    }
}
