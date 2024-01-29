<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts", name="contacts")
     */
    public function listeContact(): Response
    {
        $manager = $this->$this->getDoctrine()->getManager();
        $repo =  $manager->getRepository(Contact::class);
        $contacts = $repo->findAll();

        return $this->render('contact/listeContacts.html.twig', [
           /* 'controller_name' => 'ContactController',*/
           'lesContacts' => $contacts
        ]);
    }
}
