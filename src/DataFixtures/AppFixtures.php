<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Classroom;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class AppFixtures.
 */
class AppFixtures extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; ++$i) {
            $classroom = new Classroom();

            $classroom
                ->setName('Class '.$i)
                ->setEnabled(rand(0, 1) < 0.5);

            $manager->persist($classroom);
        }

        $manager->flush();
    }
}
