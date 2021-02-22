<?php

namespace App\Controller;

use App\Entity\Score;
use App\Entity\Game;
use App\Entity\Player;
use App\FakeData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;


#[Route("/score",name:"score_")]
class ScoreController extends AbstractController
{

    #[Route("",name:"index")]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $scores = $entityManager->getRepository(Score::class)->findAll();

        $games = $entityManager->getRepository(Game::class)->findAll();
        $players = $entityManager->getRepository(Player::class)->findAll();

        return $this->render("score/index.html.twig", ["scores" => $scores,
            "games" => $games, "players" => $players]);
    }

    #[Route("/add",name:"add")]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $score = new Score();
        
        if ($request->getMethod() == Request::METHOD_POST) {
            /**
             * @todo enregistrer l'objet
             */

            $player = $entityManager->getRepository(Player::class)->find($request->get('player'));
            $game = $entityManager->getRepository(Game::class)->find($request->get('game'));
            
            $score->setScore($request->get('score'));
            $score->setGame($game);
            $score->setPlayer($player);

            $entityManager->persist($score);
            $entityManager->flush();

        }
        
        return $this->redirectTo("/score");
    }

    #[Route("/delete/{id}",name:"delete")]
    public function delete($id,  EntityManagerInterface $entityManager): Response
    {
        /**
         * @todo supprimer l'objet
         */

        $score = $entityManager->getRepository(Score::class)->find($id);
        $entityManager->remove($score);
        $entityManager->flush();
         
        return $this->redirectTo("/score");

    }

}