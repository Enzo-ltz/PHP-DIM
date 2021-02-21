<?php

namespace App\Controller;

use App\Entity\Score;
use App\Entity\Game;
use App\Entity\Player;
use App\FakeData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;


class ScoreController extends AbstractController
{


    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $scores = $entityManager->getRepository(Score::class)->findAll();

        $games = $entityManager->getRepository(Game::class)->findAll();
        $players = $entityManager->getRepository(Player::class)->findAll();

        return $this->render("score/index", ["scores" => $scores,
            "games" => $games, "players" => $players]);
    }

    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $score = new Score();

        if ($request->getMethod() == Request::METHOD_POST) {
            /**
             * @todo enregistrer l'objet
             */
            $score->setScore($request->get('score'));
            $score->setPlayer($request->get('player'));

            $entityManager->persist($score);
            $entityManager->flush();

            return $this->redirectTo("/score");
        }
    }

}