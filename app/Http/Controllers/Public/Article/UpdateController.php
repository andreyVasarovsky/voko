<?php


namespace App\Http\Controllers\Public\Article;

use App\Http\Controllers\Admin\Article\BaseController;
use App\Http\Requests\Admin\Article\UpdateRequest;
use App\Models\Article;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Article $article)
    {
        $data = $request->validated();
        $this->service->update($article, $data);
        return redirect(route('public.article.show', $article->id));
    }
}
