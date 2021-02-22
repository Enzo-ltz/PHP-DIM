<?php
namespace App\Controller;


use App\FakeData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Player;


class PlayerController extends AbstractController
{


    public function index(EntityManagerInterface $entityManager): Response
    {
        /**
         * @todo lister les joueurs
         */
        // $players = FakeData::players(25);
        $players = $entityManager->getRepository(Player::class)->findAll();
        return $this->render("player/index.html.twig", ["players" => $players]);

    }

    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        // $player = FakeData::players(1)[0];
        $player = new Player();

        if ($request->getMethod() == Request::METHOD_POST) {
            /**
             * @todo enregistrer l'objet
             */
            $player->setUsername($request->get('username'));
            $player->setEmail($request->get('email'));

            $entityManager->persist($player);
            $entityManager->flush();

            return $this->redirectTo("/player");
        }
        return $this->render("player/form.html.twig", ["player" => $player]);
    }


    public function show($id, EntityManagerInterface $entityManager): Response
    {
        // $player = FakeData::players(1)[0];
        $player = $entityManager->getRepository(Player::class)->find($id);
        return $this->render("player/show.html.twig", ["player" => $player, "availableGames" => FakeData::games()]);
    }


    public function edit($id, Request $request, EntityManagerInterface $entityManager): Response
    {
        // $player = FakeData::players(1)[0];

        $player = $entityManager->getRepository(Player::class)->find($id);
        

        if ($request->getMethod() == Request::METHOD_POST) {
            /**
             * @todo enregistrer l'objet
             */
            $player->setUsername($request->get('username'));
            $player->setEmail($request->get('email'));

            $entityManager->persist($player);
            $entityManager->flush();
            return $this->redirectTo("/player");
        }
        return $this->render("player/form.html.twig", ["player" => $player]);


    }

    public function delete($id,  EntityManagerInterface $entityManager): Response
    {
        /**
         * @todo supprimer l'objet
         */

        $player = $entityManager->getRepository(Player::class)->find($id);
        $entityManager->remove($player);
        $entityManager->flush();
         
        return $this->redirectTo("/player");

    }

    public function addgame($id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $player = $entityManager->getRepository(Player::class)->find($id);

        if ($request->getMethod() == Request::METHOD_POST) {
            /**
             * @todo enregistrer l'objet
             */

            $player->setOwned($request->get('game'));
            $entityManager->persist($player);
            $entityManager->flush();

            return $this->redirectTo("/player");
        }
    }

}
