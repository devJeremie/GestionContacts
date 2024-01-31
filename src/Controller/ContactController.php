<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts", name="contacts")
     */
    public function listeContact(ContactRepository $repo): Response
    {
        #{$manager = $this->getDoctrine()->getManager();#}
        #{$repo =  $manager->getRepository(Contact::class);#}
        $contacts = $repo->findAll();

        return $this->render('contact/listeContacts.html.twig', [
           /* 'controller_name' => 'ContactController',*/
           'lesContacts' => $contacts
        ]);
    }
}
