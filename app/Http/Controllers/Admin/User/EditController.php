<?php


namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\User\BaseController;
use App\Models\User;
use Spatie\Permission\Models\Role;

class EditController extends BaseController
{
    public function __invoke(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }
}
