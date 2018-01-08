<?php

namespace AppBundle\Controller;

use AppBundle\Service\MarvelApi;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        /**
         * @var MarvelApi $marvelApi
         */
        $marvelApi = $this->container->get('marvel_api');

        $characters = $marvelApi->getCharacters(20, 100);

        return $this->render('default\index.html.twig', [
            'characters' => $characters
        ]);
    }
}
