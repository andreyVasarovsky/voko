<?php


namespace App\Http\Controllers\Admin\Article\Image;

use App\Http\Controllers\Admin\Article\Image\BaseController;
use App\Http\Requests\Admin\Article\Image\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $result = $this->service->store($data);
        return response()->json($result);
    }
}
