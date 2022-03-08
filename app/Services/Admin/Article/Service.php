<?php


namespace App\Services\Admin\Article;


use App\Models\Article;
use Illuminate\Http\UploadedFile;

class Service
{
    const STORAGE_FILE_PATH = 'storage/article/';
    const PUBLIC_FILE_PATH = 'public/article/';

    public function store($data)
    {
        $preview = $data['preview'];
        unset($data['preview']);
        $article = Article::firstOrCreate($data);
        $filename = $article->id . '.' . $preview->extension();
        $preview->storeAs(self::PUBLIC_FILE_PATH, $filename);
        $article->update(['preview' => self::STORAGE_FILE_PATH . $filename]);
    }

    public function update(Article $article, $data)
    {
        if ($data['preview'] !== null){
            $filename = $article->id . '.' . $data['preview']->extension();
            $data['preview']->storeAs(self::PUBLIC_FILE_PATH, $filename);
        }
        unset($data['preview']);
        $article->update($data);
    }
}
