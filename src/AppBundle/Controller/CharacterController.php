<?php

namespace AppBundle\Controller;

use AppBundle\Service\MarvelApi;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class CharacterController extends Controller
{

    /**
     * @Route("/character/{id}", name="character")
     */
    public function indexAction($id)
    {
        /**
         * @var MarvelApi $marvelApi
         */
        $marvelApi = $this->container->get('marvel_api');

        $character = $marvelApi->getCharacter($id);

        return $this->render('default\character.html.twig', [
            'character' => $character
        ]);
    }
}
