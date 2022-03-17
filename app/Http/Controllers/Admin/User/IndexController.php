<?php


namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\User\BaseController;
use App\Models\User;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $users = User::sortable()->withCount('comments')->withCount('articles')->get();
        return view('admin.user.index', compact('users'));
    }
}
