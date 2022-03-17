<?php


namespace App\Http\Controllers\Public\Comment;


use App\Http\Controllers\Controller;
use App\Services\Public\Comment\Service;

class BaseController extends Controller
{
    public Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

}
