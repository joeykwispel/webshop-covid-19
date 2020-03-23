<?php

namespace App\Controller;

use App\Entity\FactuurProducten;
use App\Form\FactuurProductenType;
use App\Repository\FactuurProductenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/factuurproducten")
 */
class FactuurProductenController extends AbstractController
{
    /**
     * @Route("/", name="factuur_producten_index", methods={"GET"})
     */
    public function index(FactuurProductenRepository $factuurProductenRepository): Response
    {
        return $this->render('factuur_producten/index.html.twig', [
            'factuur_productens' => $factuurProductenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="factuur_producten_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $factuurProducten = new FactuurProducten();
        $form = $this->createForm(FactuurProductenType::class, $factuurProducten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($factuurProducten);
            $entityManager->flush();

            return $this->redirectToRoute('factuur_producten_index');
        }

        return $this->render('factuur_producten/new.html.twig', [
            'factuur_producten' => $factuurProducten,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="factuur_producten_show", methods={"GET"})
     */
    public function show(FactuurProducten $factuurProducten): Response
    {
        return $this->render('factuur_producten/show.html.twig', [
            'factuur_producten' => $factuurProducten,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="factuur_producten_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FactuurProducten $factuurProducten): Response
    {
        $form = $this->createForm(FactuurProductenType::class, $factuurProducten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('factuur_producten_index');
        }

        return $this->render('factuur_producten/edit.html.twig', [
            'factuur_producten' => $factuurProducten,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="factuur_producten_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FactuurProducten $factuurProducten): Response
    {
        if ($this->isCsrfTokenValid('delete'.$factuurProducten->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($factuurProducten);
            $entityManager->flush();
        }

        return $this->redirectToRoute('factuur_producten_index');
    }
}
