<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    #[Route('/car', name: 'app_car')]
    public function index(EntityManagerInterface $manager): Response
    {
        $car = new Car();

        $car->setRegistrationNumber('12345 - A - 48');

        // ...

        $manager->remove($car);

        $manager->persist($car);
        $manager->flush();



        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
        ]);
    }

    #[Route('/car/view/{id}', name: 'app_car')]
    public function get(int $id, EntityManagerInterface $manager): Response
    {
        /** @var CarRepository $repository */
        $repository = $manager->getRepository(Car::class);

        /** @var ?Car $car */
        $car = $repository->find($id);

        if (null === $car) {
            throw new NotFoundHttpException('Resource not found');
        }

        // ...


        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
            'car' => $car,
        ]);
    }

    #[Route(path: "/car/delete/{id}", name: "app_car_delete")]
    public function deleteCar(EntityManagerInterface $manager, Car $car): Response
    {
        $manager->remove($car);

        $manager->flush();

        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
            'car' => $car,
        ]);
    }

    #[Route(path: "/car/add", name: "app_car_new")]
    public function addNewCar(EntityManagerInterface $manager): Response
    {
        $car = new Car();
        // ...

        $manager->persist($car);

        $manager->flush();

        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
            'car' => $car,
        ]);
    }

    #[Route(path: "/car/edit/{id}", name: "app_car_edit")]
    public function editCar(EntityManagerInterface $manager, Car $car): Response
    {

        // ...

        $manager->flush();

        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
            'car' => $car,
        ]);
    }
}
