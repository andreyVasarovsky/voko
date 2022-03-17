<?php


namespace App\Services\Public\Profile;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Service
{
    public function update(User $user, $data)
    {
        if (!empty($data['old_password'])){
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }
        unset($data['old_password']);
        unset($data['password_confirmation']);
        $user->update($data);
    }
}
