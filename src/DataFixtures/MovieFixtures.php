<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return [DirectorFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        $rednotice = new Movie();
        $rednotice->setTitle('Red Notice');
        $rednotice->setYear(2021);
        $rednotice->setSynopsis('Lorsqu\'Interpol déclenche une Alerte Rouge, destinée à traquer et à capturer les criminels les plus recherchés au monde, le FBI fait appel à son meilleur profiler, John Hartley.');
        $rednotice->addDirector($this->getReference('rawsonmarshallthurber'));
        $manager->persist($rednotice);

        $spidermanfarfromhome = new Movie();
        $spidermanfarfromhome->setTitle('Spider-Man: Far From Home');
        $spidermanfarfromhome->setYear(2019);
        $spidermanfarfromhome->setSynopsis("L'araignée sympa du quartier décide de rejoindre ses meilleurs amis Ned, MJ, et le reste de la bande pour des vacances en Europe. Cependant, le projet de Peter de laisser son costume de super-héros derrière lui pendant quelques semaines est rapidement compromis quand il accepte à contrecoeur d'aider Nick Fury à découvrir le mystère de plusieurs attaques de créatures, qui ravagent le continent !");
        $spidermanfarfromhome->addDirector($this->getReference('jonwatts'));
        $manager->persist($spidermanfarfromhome);

        $joker = new Movie();
        $joker->setTitle('Joker');
        $joker->setYear(2019);
        $joker->setSynopsis("Arthur Fleck, comédien raté, rencontre des voyous violents en errant dans les rues de Gotham City déguisé en clown. Méprisé par la société, Fleck s'enfonce peu à peu dans la démence et devient le génie criminel connu sous le nom de Joker, un dangereux tueur psychotique.");
        $joker->addDirector($this->getReference('toddphillips'));
        $manager->persist($joker);

        $avengers = new Movie();
        $avengers->setTitle('Avengers: Endgame');
        $avengers->setYear(2019);
        $avengers->setSynopsis("Le Titan Thanos, ayant réussi à s'approprier les six Pierres d'Infinité et à les réunir sur le Gantelet doré, a pu réaliser son objectif de pulvériser la moitié de la population de l'Univers. Cinq ans plus tard, Scott Lang, alias Ant-Man, parvient à s'échapper de la dimension subatomique où il était coincé. Il propose aux Avengers une solution pour faire revenir à la vie tous les êtres disparus, dont leurs alliés et coéquipiers : récupérer les Pierres d'Infinité dans le passé.");
        $avengers->addDirector($this->getReference('kevinfeige'));
        $manager->persist($avengers);

        $manager->flush();
    }
}
