<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


class DefaultController
{
    public function index()
    {
        return new Response("<h1>I a fresh Symfony 4 Installation</h1>");
    }

    /**
     * @Route("/hello")
     * @param $name
     * @return Response
     */
    public function hello($name)
    {
        return new Response("Hello " . $name);
    }
}