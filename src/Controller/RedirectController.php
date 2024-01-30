<?php

namespace App\Controller;

use App\Entity\Url;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RedirectController extends AbstractController
{
    public function __construct(private \Doctrine\Persistence\ManagerRegistry $managerRegistry)
    {
    }

    #[Route('/{urlCorta}', name: 'redireccion_url_real', methods: ['GET'])]
    public function redirectUrlReal($urlCorta, EntityManagerInterface $entityManager)
    {
        $urlRepository = $entityManager->getRepository(Url::class);
        $url = $urlRepository->findOneBy(['url_corta' => $urlCorta]);
        
        if ($url) {
            $url->incrementarAccesos();
            $entityManager = $this->managerRegistry->getManager();
            $entityManager->flush();
            header('Location:' . $url->getUrlReal());
            die();
        } else {
            return $this->render('bundles/TwigBundle/Exception/error404.html.twig');
        }   
    }
}
