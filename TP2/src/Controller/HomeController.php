<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    public function __construct()
    {
    }

    function index(Request $request): Response
    {
        return $this->render(
            "home/index",
            [
                "name"=>$request->get('name')
            ]
        );
    }
}