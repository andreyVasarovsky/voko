<?php

namespace App\Http\Controllers\Public\Article;

use App\Http\Controllers\Admin\Article\BaseController;
use App\Http\Requests\Admin\Article\StoreRequest;
use Illuminate\Support\Facades\Auth;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect(route('public.profile.index', Auth::user()->id));
    }
}
