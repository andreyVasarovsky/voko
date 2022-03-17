<?php


namespace App\Http\Controllers\Public\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\User\UpdateRequest;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        dd($data);
        $user->update($data);
        return redirect(route('admin.user.show', $user->id));
    }
}
