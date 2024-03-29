<?php

namespace App\Controller;

use App\Entity\Url;
use App\Entity\User;
use App\Form\UrlType;
use App\Form\UrlShortType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class UrlController extends AbstractController
{
    public function __construct(private \Doctrine\Persistence\ManagerRegistry $managerRegistry)
    {
        
    }

    #[Route('/newUrl', name: 'url_shortener_new', methods: ['GET', 'POST'])]
    public function newUrlshortener(Request $request)
    {
        $url = new Url();
        $form = $this->createForm(UrlType::class, $url);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $urlReal = $form->get('urlReal')->getData();
            
            $entityManager = $this->managerRegistry->getManager();
            $urlEntity = new Url();
            
            if(is_null($form->get('urlCorta')->getData())) {
                $urlCorta = substr(md5($urlReal), 0, 8);
                $urlEntity->setUrlReal($urlReal);
                $urlEntity->setUrlCorta($urlCorta);
                $urlCortaGenerada = $urlEntity->getUrlCorta($urlCorta);
                $urlEntity->setCreationDate(new \DateTime());
                $user = $this->getUser();
                $urlEntity->setUser($user);

                $entityManager->persist($urlEntity);
                $entityManager->flush();
            } else {
                $urlCortaGenerada = $form->get('urlCorta')->getData();
                $urlEntity->setUrlReal($urlReal);
                $urlEntity->setUrlCorta($urlCortaGenerada);
                $urlEntity->setCreationDate(new \DateTime());
                $user = $this->getUser();
                $urlEntity->setUser($user);

                $entityManager->persist($urlEntity);
                $entityManager->flush();
            }
            $this->addFlash(
                'success', 
                'Su url corta ha sido guardada exitosamente, es la siguiente: https://localhost:8000/' . $urlCortaGenerada);
            return $this->redirectToRoute('url_shortener_new');
        }
    
        return $this->render('url/newUrl.html.twig', [
            'url' => $url,
            'form' => $form,
        ]);
    }
}