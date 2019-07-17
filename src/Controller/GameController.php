<?php

namespace App\Controller;

use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Platform;

/**
 * Class GameController
 * @package App\Controller
 */
class GameController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('game/home.html.twig');
    }

    /**
     * @Route("/games", name="games")
     */
    public function games()
    {
        $repo=$this->getDoctrine()->getRepository(Game::class);
        $games=$repo->findBy(array(), array('name' => 'ASC'));

        return $this->render('game/games.html.twig', [
            'games' => $games
        ]);
    }

    /**
     * @Route("/game/{id}", name="game")
     */
    public function game($id)
    {
        $repo=$this->getDoctrine()->getRepository(Game::class);
        $game=$repo->find($id);

        return $this->render('game/game.html.twig', [
           'game' => $game
        ]);
    }

    /**
     * @Route("/platforms", name="platforms")
     */
    public function platforms() 
    {
        $repo=$this->getDoctrine()->getRepository(Platform::class);
        $platforms=$repo->findAll();
    
        return $this->render('game/platforms.html.twig', [
            'platforms' => $platforms
        ]);
    }

    /**
     * @Route("/platform/{id}", name="platform")
     */
    public function platform($id)
    {
        $repoPlatform=$this->getDoctrine()->getRepository(Platform::class);
        $platform=$repoPlatform->find($id);

        $repoGame=$this->getDoctrine()->getRepository(Game::class);
        $games=$repoGame->findBy(['platform' => $id]);

        return $this->render('game/platform.html.twig', [
           'platform' => $platform,
            'games' => $games
        ]);
    }
}
