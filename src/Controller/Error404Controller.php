<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Error404Controller extends AbstractController
{
    #[Route('/error404', name: 'error_404')]
    public function mostrarError(): Response
    {
        return $this->render('bundles/TwigBundle/Exception/error404.html.twig');
    }
}
