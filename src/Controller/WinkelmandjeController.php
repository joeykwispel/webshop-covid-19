<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WinkelmandjeController extends AbstractController
{
    /**
     * @Route("/winkelmandje", name="winkelmandje")
     */
    public function index()
    {
        return $this->render('winkelmandje/index.html.twig', [
            'controller_name' => 'WinkelmandjeController',
        ]);
    }
}
