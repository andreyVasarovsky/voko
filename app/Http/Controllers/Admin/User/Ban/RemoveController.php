<?php


namespace App\Http\Controllers\Admin\User\Ban;

use App\Http\Controllers\Admin\User\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class RemoveController extends BaseController
{
    public function __invoke(User $user)
    {
        $user->update(['banned' => false]);
        return Redirect::back();
    }
}
