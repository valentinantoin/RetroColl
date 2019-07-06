<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game")
     */
    public function index()
    {
        return $this->render('game/game.html.twig');
    }

    /**
     * @Route("/platforms", name="platforms")
     */
    public function platforms() 
    {
        return $this->render('game/platforms.html.twig');
    }
}
