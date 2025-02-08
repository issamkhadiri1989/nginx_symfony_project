<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

#[AsController]
class SecurityController
{
    public function __construct(private readonly Environment $renderer)
    {
    }

    #[Route(name: 'app.security.login', path: '/connect')]
    public function connect(AuthenticationUtils $authenticationUtils): Response
    {
        $lastUsername = $authenticationUtils->getLastUsername();
        $error = $authenticationUtils->getLastAuthenticationError();

        $content = $this->renderer->render('security/connect.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);

        return new Response($content);
    }
}
