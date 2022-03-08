<?php


namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Admin\Article\BaseController;
use App\Models\Article;

class DestroyController extends BaseController
{
    public function __invoke(Article $article)
    {
        $this->service->delete($article);
        return redirect(route('admin.article.index'));
    }
}
