<?php


namespace App\Http\Controllers\Admin\Article\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\Image\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        dd($data);
//        return redirect(route('admin.article.index'));
    }
}
