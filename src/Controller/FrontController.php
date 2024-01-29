<?php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/')]
class FrontController extends AbstractController
{
    #[Route('/', name: 'default')]
    public function index(): Response
    {
        if(empty($this->getUser())) {
            return $this->redirectToRoute(route: 'app_login');
        } else {
            return $this->redirectToRoute(route: 'url_shortener_new');
        }
    }
}