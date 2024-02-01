<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categories", name="categories", methods={"GET"})
     */
    public function listeCategories(CategorieRepository $repo): Response
    {
        $categories = $repo->findAll();
        return $this->render('categorie/listeCategories.html.twig', [
            'lesCategories' => $categories
        ]);
    }

     /**
     * @Route("/categorie/{id}", name="ficheCategorie", methods={"GET"})
     */
    public function ficheCategorie($id, CategorieRepository $repo): Response
    {
        $categorie = $repo->find($id);
        return $this->render('categorie/ficheCategorie.html.twig', [
            'laCategorie' => $categorie
        ]);
    }

}
