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
     * @Route("/{page}", name="homepage")
     */
    public function indexAction($page=null)
    {
        /**
         * @var MarvelApi $marvelApi
         */
        $marvelApi = $this->container->get('marvel_api');

        $offset = 100;
        if (isset($page)) {
            $offset = 100+20*$page;
        }

        $characters = $marvelApi->getCharacters(20, $offset);

        return $this->render('default\index.html.twig', [
            'characters' => $characters,
            'page' => $page ?: 0
        ]);
    }
}
