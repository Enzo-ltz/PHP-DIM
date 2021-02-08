<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;


class HomeController extends AbstractController
{

    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render("home/index", ["name" => $request->query->get('name')]);
    }
}