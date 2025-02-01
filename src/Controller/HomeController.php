<?php

declare(strict_types=1);

namespace App\Controller;

use App\Domain\DomainHandlerCollection;
use App\Factory\Manager\NewsletterManager;
use App\Factory\Manager\NewsletterManagerInterface;
use App\HandlerCollection;
use App\Mail\TransportChain;
use App\Manager\FileManager;
use App\Service\Container;
use App\Service\Formatter\MessageFormatterGenerator;
use App\Service\Hash\MessageHashGenerator;
use App\Service\MessageGenerator;
use App\Service\MessageUtils;
use App\Service\PublicService;
use App\Service\SiteUpdateManager;
use App\Shared\ServiceManager;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    public function __construct(
        #[Autowire(expression: 'service("App\\\Cache\\\CacheWrapper").getCacheStrategy()')]
        private readonly string $cacheKey,
        #[Autowire('%kernel.project_dir%')]
        private readonly string $projectDir,
        private readonly ServiceManager $manager,
        private readonly MessageUtils $utils,
    ) {
    }

    #[Route(name: 'app_homepage', path: '/')]
    public function homepage(
        /*DomainHandlerCollection $collection,*/
        /*MessageFormatterGenerator $generator,*/
//        PublicService $publicService,
//        FileManager $manager,
        NewsletterManagerInterface $manager,
    ): Response
    {
        $manager->subscribe();

        $manager->markAsCalled();
//        $collection->doSomething();
//        $generator->doSomeLogic('issam');

//        $publicService->compute();

        $string = $this->utils->someFormatMessage('message', []);

        return $this->render('page/homepage.html.twig', [
            'title' => 'this is a variable passed to twig template'
        ]);
    }

    #[Route(path: "/contact-us", name: "app_contact_us")]
    public function contact(): Response
    {
        return $this->render('page/contact.html.twig');
    }

    #[Route(path: "/about-us", name: "app_about")]
    public function about(): Response
    {
        return $this->render('page/about.html.twig');
    }

    #[Route(name: 'app_terms_and_conditions', path: "/termes-and-conditions")]
    public function terms(): Response
    {
        return $this->render('page/terms.html.twig');
    }

    #[Route(path: "/empty", name: "app.empty_page")]
    public function testPage(PublicService $publicService): Response
    {
//        $manager->notifyOfSiteUpdate();

//        $generator->getHappyMessage();

//        $container->doSomething();

        return new Response(  $publicService->compute());
    }
}
