<?php

namespace App\Controller;

use App\Service\DefaultService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


class DefaultController
{
    private $service;

    public function __construct(DefaultService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return new Response("<h1>I'm a fresh Symfony 4 Installation</h1>");
    }

    /**
     * @Route("/hello/{name}")
     * @param $name
     *
     * @return Response
     */
    public function hello($name)
    {
        return new Response("Hello ".$name);
    }

    /**
     * @Route("/date")
     * @return Response
     */
    public function dateUsingService()
    {
        $date = $this->service->theDate();

        return new Response("The date is: ".$date);
    }
}