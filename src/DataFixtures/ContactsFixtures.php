<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create("fr_FR");
        $categories=[];

        $categorie = new Categorie();
        $categorie ->setLibelle("Professionnel")
                   ->setDescription($faker->sentence(50))
                   ->setImage("https://picsum.photos/id/5/200/300");
        $manager->persist($categorie);
        $categories[]=$categorie;

        $categorie = new Categorie();
        $categorie ->setLibelle("Sport")
                   ->setDescription($faker->sentence(50))
                   ->setImage("https://picsum.photos/id/73/200/300");
        $manager->persist($categorie);
        $categories[]=$categorie;

        $categorie = new Categorie();
        $categorie ->setLibelle("Privé")
                   ->setDescription($faker->sentence(50))
                   ->setImage("https://picsum.photos/id/342/200/300");
        $manager->persist($categorie);
        $categories[]=$categorie;

        $genres = ["male", "female"];
       

        for ($i=0 ;$i < 100; $i++) {
            $sexe = mt_rand(0,1);
            if ($sexe==0) {
                $type = 'men';
            }else {
                $type = 'women';
            }

            $contact = new Contact();
            $contact->setNom($faker->lastName())
                    /*->setPrenom($faker->firstName($genres[mt_rand(0,1)]))*/
                    ->setPrenom($faker->firstName($genres[$sexe]))
                    ->setRue($faker->streetAddress())
                    ->setCp($faker->numberBetween(33000,75000))
                    ->setVille($faker->city())
                    ->setMail($faker->email())
                    ->setSexe($sexe)
                    ->setCategorie($categories[mt_rand(0,2)])
                    ->setAvatar("https://randomuser.me/api/portraits/". $type."/". $i.".jpg");
            $manager->persist($contact);
        }

        $manager->flush();
    }
}
