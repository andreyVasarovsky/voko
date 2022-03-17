<?php


namespace App\Http\Controllers\Admin\User\Ban;

use App\Http\Controllers\Admin\User\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class AddController extends BaseController
{
    public function __invoke(User $user)
    {
        $user->update(['banned' => true]);
        return Redirect::back();
    }
}
