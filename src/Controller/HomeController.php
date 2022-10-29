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

/**
 * @Route("/home")
 */


  
class HomeController extends AbstractController
{
    
   
    /**
     * @Route("/", name="app_home_index", methods={"GET"})
     */
   
    public function index(ActiviteRepository $activiteRepository,SeanceRepository $seanceRepository,CoachRepository $coachRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
                'activites' => $activiteRepository->findAll(),
                'coaches' => $coachRepository->findAll(),
                'seances' => $seanceRepository->findAll(),
            
        ]);
    }
    /**
     * @Route("/table", name="app_table", methods={"GET", "POST"})
     */
 
    public function table(CoachRepository $coachRepository,ActiviteRepository $activiteRepository,SeanceRepository $seanceRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
                'activites' => $activiteRepository->findAll(),
                
                'seances' => $seanceRepository->findAll(),
                'coaches' => $coachRepository->findAll(),
            
        ]);
    }
}