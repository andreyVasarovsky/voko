<?php


namespace App\Services\Admin\Article\Image;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data): array
    {
        $filename = md5(Carbon::now().'_'.$data['image']->getClientOriginalName()).'.'.$data['image']->extension();
        try {
            $filePath = Storage::disk('public')->putFileAs('/article/images', $data['image'], $filename);
        }catch (\Exception $ex){
            return ['status' => false, 'msg' => $ex->getMessage(), 'link' => ''];
        }
        return ['status' => true, 'msg' => '', 'link' => url('/storage/'.$filePath)];
    }
}
