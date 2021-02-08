<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{

    public function index(Request $request): Response
    {
        return $this->render("home/index", ["name" => $request->query->get('name')]);
    }
}