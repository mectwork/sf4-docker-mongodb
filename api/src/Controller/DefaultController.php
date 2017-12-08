<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index()
    {
        return new Response("<h1>I a fresh Symfony 4 Installation</h1>");
    }
}