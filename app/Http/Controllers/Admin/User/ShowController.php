<?php


namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\User\BaseController;
use App\Models\User;

class ShowController extends BaseController
{
    public function __invoke(User $user)
    {
        return view('admin.user.show', compact('user'));
    }
}
