<?php


namespace App\Http\Controllers\Public\Like;


use App\Http\Controllers\Controller;
use App\Http\Requests\Public\Like\StoreRequest;
use App\Models\Like;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Like::firstOrCreate($data);
        return redirect()->back();
    }
}
