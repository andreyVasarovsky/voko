<?php


namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\User\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class DestroyController extends BaseController
{
    public function __invoke(User $user)
    {
        $response = $this->service->delete($user);
        if (!$response['status']){
            return Redirect::back()->withErrors([$response['msg']]);
        }
        return redirect(route('admin.user.index'));
    }
}
