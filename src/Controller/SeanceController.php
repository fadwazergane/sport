<?php

namespace App\Controller;

use App\Entity\Seance;
use App\Form\Seance1Type;
use App\Repository\SeanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/seance")
 */
class SeanceController extends AbstractController
{
    /**
     * @Route("/", name="app_seance_index", methods={"GET"})
     */
    public function index(SeanceRepository $seanceRepository): Response
    {
        return $this->render('seance/index.html.twig', [
            'seances' => $seanceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_seance_new", methods={"GET", "POST"})
     */
    public function new(Request $request, SeanceRepository $seanceRepository): Response
    {
        $seance = new Seance();
        $form = $this->createForm(Seance1Type::class, $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $seanceRepository->add($seance, true);

            return $this->redirectToRoute('app_seance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('seance/new.html.twig', [
            'seance' => $seance,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_seance_show", methods={"GET"})
     */
    public function show(Seance $seance): Response
    {
        return $this->render('seance/show.html.twig', [
            'seance' => $seance,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_seance_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Seance $seance, SeanceRepository $seanceRepository): Response
    {
        $form = $this->createForm(Seance1Type::class, $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $seanceRepository->add($seance, true);

            return $this->redirectToRoute('app_seance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('seance/edit.html.twig', [
            'seance' => $seance,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_seance_delete", methods={"POST"})
     */
    public function delete(Request $request, Seance $seance, SeanceRepository $seanceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$seance->getId(), $request->request->get('_token'))) {
            $seanceRepository->remove($seance, true);
        }

        return $this->redirectToRoute('app_seance_index', [], Response::HTTP_SEE_OTHER);
    }
}
