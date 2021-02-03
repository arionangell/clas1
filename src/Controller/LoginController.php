<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\User;

/**
 * @Rest\Route("/prueba")
 */

class LoginController extends AbstractFOSRestController
{

    /**
     * @Rest\Get("/login", name="ingreso")
     */

    public function index(Request $request)
    {
        return $this->render('login.html.twig' );
    }

     /**
     * @Rest\Post("/login_check", name="login")
     * @Rest\RequestParam(name="email", description="email del usuario", strict=false, nullable=true)
     * @Rest\RequestParam(name="password", description="password del usuario", strict=false, nullable=true)
     * @param Request $request
     * @param ParamFetcherInterface $paramFetcher
     * @return Response
     */

        public function login(Request $request,ParamFetcherInterface $paramFetcher){

             $email = $paramFetcher->get('email');
             $password = $paramFetcher->get('password');
             dd($email);
             $em = $this->getDoctrine()->getManager();
             $repositorio= $this->getDoctrine()->getRepository(user::class);
             $uservalido= $repositorio->findBy([
                "email" => $email,
                "pass" => $password
                                                ]);
             if (!empty($uservalido)){
                  dd($email);
                                     }
            else{
                 dd($password);
                }
       }
    }
