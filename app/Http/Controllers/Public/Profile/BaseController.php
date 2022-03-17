<?php


namespace App\Http\Controllers\Public\Profile;


use App\Http\Controllers\Controller;
use App\Services\Public\Profile\Service;

class BaseController extends Controller
{
    public Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

}
