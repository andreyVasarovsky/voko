<?php


namespace App\Http\Controllers\Public\Subscription;


use App\Http\Controllers\Controller;
use App\Http\Requests\Public\Subscription\StoreRequest;
use App\Models\Subscription;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Subscription::firstOrCreate($data);
        return redirect()->back();
    }
}
