<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\User\BaseController;
use Spatie\Permission\Models\Role;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }
}
