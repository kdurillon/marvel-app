<?php

namespace AppBundle\Controller;

use AppBundle\Service\MarvelApi;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $marvelApi = $this->container->get('marvel_api');;
        $heroes = $marvelApi->getCharacters(20, 100);
        return $this->render('default\index.html.twig', [
            'heroes' => $heroes
        ]);
    }
}
