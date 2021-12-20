<?php

namespace App\DataFixtures;

use App\Entity\Director;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DirectorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $rawsonmarshallthurber = new Director();
        $rawsonmarshallthurber->setFirstname('Rawson');
        $rawsonmarshallthurber->setLastname('Marshall Thurber');
        $this->addReference('rawsonmarshallthurber', $rawsonmarshallthurber);
        $manager->persist($rawsonmarshallthurber);

        $jonWatts = new Director();
        $jonWatts->setFirstname('Jon');
        $jonWatts->setLastname('Watts');
        $this->addReference('jonwatts', $jonWatts);
        $manager->persist($jonWatts);

        $toddphillips = new Director();
        $toddphillips->setFirstname('Todd');
        $toddphillips->setLastname('Phillips');
        $this->addReference('toddphillips', $toddphillips);
        $manager->persist($toddphillips);

        $kevinfeige = new Director();
        $kevinfeige->setFirstname('Kevin');
        $kevinfeige->setLastname('Feige');
        $this->addReference('kevinfeige', $kevinfeige);
        $manager->persist($toddphillips);

        $manager->flush();
    }
}
