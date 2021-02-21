<?php

namespace App\Controller;

use App\Entity\Game;
use App\FakeData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;


class GameController extends AbstractController
{

    public function index(EntityManagerInterface $entityManager): Response
    {
        /**
         * @todo lister les jeux de la base
         */
        // $games = FakeData::games(15);
        $games = $entityManager->getRepository(Game::class)->findAll();
        return $this->render("game/index", ["games" => $games]);

    }

    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        // $game = FakeData::games(1)[0];
        $game = new Game();

        if ($request->getMethod() == Request::METHOD_POST) {
            /**
             * @todo enregistrer l'objet
             */
            $game->setName($request->get('name'));
            $game->setImage($request->get('image'));

            $entityManager->persist($game);
            $entityManager->flush();

            return $this->redirectTo("/game");
        }
        return $this->render("game/form", ["game" => $game]);
    }


    public function show($id, EntityManagerInterface $entityManager): Response
    {
        // $game = FakeData::games(1)[0];
        $game = $entityManager->getRepository(Game::class)->find($id);
        return $this->render("game/show", ["game" => $game]);
    }


    public function edit($id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $game = FakeData::games(1)[0];

        if ($request->getMethod() == Request::METHOD_POST) {
            /**
             * @todo enregistrer l'objet
             */
            $game->setName($request->get('name'));
            $game->setImage($request->get('image'));

            $entityManager->persist($game);
            $entityManager->flush();
            return $this->redirectTo("/game");
        }
        return $this->render("game/form", ["game" => $game]);


    }

    public function delete($id, EntityManagerInterface $entityManager ): Response
    {
        /**
         * @todo supprimer l'objet
         */

        $game = $entityManager->getRepository(Game::class)->find($id);
        $entityManager->remove($game);
        $entityManager->flush();
        return $this->redirectTo("/game");

    }

}