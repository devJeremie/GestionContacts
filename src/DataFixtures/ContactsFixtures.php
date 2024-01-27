<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create("fr_FR");
        $genres = ["male", "female"];

        $contact = new Contact();
        $contact->setNom($faker->lastName())
                ->setPrenom($faker->firstName($genres[mt_rand(0,1)]))
                ->setRue($faker->streetAddress())
                ->setCp($faker->numberBetween(33000,75000))
                ->setVille($faker->city())
                ->setMail($faker->)

        $manager->flush();
    }
}
