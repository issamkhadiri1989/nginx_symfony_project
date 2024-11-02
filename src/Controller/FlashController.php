<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FlashController extends AbstractController
{
    #[Route('/flash', name: 'app_flash')]
    public function index(): Response
    {
        $this->addFlash('success', 'Well done ! you made it');
        $this->addFlash('warning', 'Beware ! Something is outdated');
        $this->addFlash('danger', 'Error ! The system is under fire.');

        return $this->render('flash/index.html.twig', [
            'controller_name' => 'FlashController',
        ]);
    }
}
