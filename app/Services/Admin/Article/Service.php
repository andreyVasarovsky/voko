<?php


namespace App\Services\Admin\Article;


use App\Models\Article;

class Service
{
    const STORAGE_FILE_PATH = 'storage/article/';
    const PUBLIC_FILE_PATH = 'public/article/';

    public function store($data)
    {
        $preview = $data['preview'];
        unset($data['preview']);
        $article = Article::firstOrCreate($data);
        $filename = $article->id.'.'.$preview->extension();
        $preview->storeAs(self::PUBLIC_FILE_PATH, $filename);
        $article->update(['preview' => self::STORAGE_FILE_PATH.$filename]);
    }
}
