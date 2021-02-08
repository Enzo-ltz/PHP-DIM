<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function index(Request $request): Response {

        return new Response('it works');
    }
}