<?php


namespace App\Http\Controllers\Admin\Article\Image;


use App\Http\Controllers\Controller;
use App\Services\Admin\Article\Image\Service;

class BaseController extends Controller
{
    public Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

}
