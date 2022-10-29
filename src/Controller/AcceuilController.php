<?php

namespace App\Controller;
use App\Controller\Activite;
use App\Entity\Seance;
use App\Entity\Coach;
use App\Repository\ActiviteRepository;
use App\Repository\CoachRepository;
use App\Repository\SeanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    
      /**
     * @Route("/acceuil", name="app_acceuil")
     */  
    
    public function index(CoachRepository $coachRepository,ActiviteRepository $activiteRepository,SeanceRepository $seanceRepository): Response
    {
        return $this->render('acceuil/index.html.twig', [
            'controller_name' => 'acceuilController',
                'activites' => $activiteRepository->findAll(),
                
                'seances' => $seanceRepository->findAll(),
                'coaches' => $coachRepository->findAll(),
            
        ]);
    }
}
