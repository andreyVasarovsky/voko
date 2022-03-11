<?php


namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Admin\Article\BaseController;
use App\Http\Requests\Admin\Article\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        dd($data);
        $this->service->store($data);
        return redirect(route('admin.article.index'));
    }
}
