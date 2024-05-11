<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use ValidatesRequests;
    protected $HTTP_OK = Response::HTTP_OK;
    protected $HTTP_NOT_FOUND = Response::HTTP_NOT_FOUND;
    protected $HTTP_UNPROCESSABLE_ENTITY = Response::HTTP_UNPROCESSABLE_ENTITY;
}
