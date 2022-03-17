<?php


namespace App\Http\Controllers\Public\Profile;

use App\Http\Controllers\Public\Profile\BaseController;
use App\Http\Requests\Public\Profile\UpdateRequest;
use App\Models\User;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        try {
            $data = $request->validated();
            $this->service->update($user, $data);
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect()->back()->with('success', 'Обновлено!');
    }
}
