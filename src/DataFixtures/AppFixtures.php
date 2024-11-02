<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Factory\BookFactory;
use App\Factory\CategoryFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CategoryFactory::createMany(10);

        BookFactory::createMany(300);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
