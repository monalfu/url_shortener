<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Url;


class UserController extends AbstractController
{
    public function __construct()
    {
        
    }

    #[Route('/urls/list', name: 'listado_urls', methods: ['POST'])]
    public function listarUrls()
    {
       $user = $this->getUser();
       dd($this->getUser()->getId());
    }

}
