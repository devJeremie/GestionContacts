<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\CategorieRepository;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts", name="contacts", methods={"GET"})
     */
    public function listeContacts(ContactRepository $repo ): Response
    {
        #{$manager = $this->getDoctrine()->getManager();#}
        #{$repo =  $manager->getRepository(Contact::class);#}
        $Contacts = $repo->findAll();

        return $this->render('contact/listeContacts.html.twig', [
           /* 'controller_name' => 'ContactController',*/
           'lesContacts' => $Contacts
        ]);
    }

     /**
     * @Route("/contact/{id}", name="ficheContact", methods={"GET"})
     */
    public function ficheContact( $id, ContactRepository $repo): Response
    {
        $contact = $repo->find($id);
        return $this->render('contact/ficheContact.html.twig', [
            'controller_name' => 'ContactController',
          'leContact' => $contact
        ]);
    }

     /**
     * @Route("/contact/sexe/{sexe}", name="listeContactsSexe", methods={"GET"})
     */
    public function listeContactsSexe( $sexe, ContactRepository $repo): Response
    {
        //$Contacts = $repo->findBySexe($sexe);//
        $Contacts = $repo->findBy(
            ['sexe' => $sexe],
            ['nom'=>'ASC'],
        );
        return $this->render('contact/listeContacts.html.twig', [
            'controller_name' => 'ContactController',
           'lesContacts' => $Contacts

        ]);
    }

    
    
}
