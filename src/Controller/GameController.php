<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Platform;

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
        $repo=$this->getDoctrine()->getRepository(Platform::class);
        $platforms=$repo->findAll();
    
        return $this->render('game/platforms.html.twig', [
            'platforms' => $platforms
        ]);
    }
}
