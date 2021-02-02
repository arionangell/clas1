<?php

namespace App\Controller\ej1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EjController extends AbstractController
{
    /**
     * @Route("/ej", name="ej")
     */
    public function index(): Response
    {
      
        $s=10;
        $z=2;
        $m='Prueba';
        return $this->render('contador.html.twig', [
            'control' => $m,
            's' => $s,
             'z' => $s,

        ]);
    }
}
