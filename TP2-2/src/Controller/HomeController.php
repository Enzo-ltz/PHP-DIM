<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class HomeController extends AbstractController
{
    #[Route("/",name:"homepage")]
    
    public function index(Request $request): Response
    {
        return $this->render("home/index.html.twig", ["name" => $request->query->get('name')]);
    }
}