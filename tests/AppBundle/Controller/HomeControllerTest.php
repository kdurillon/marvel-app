<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        // Assert 20 character are displayed on homepage
        $this->assertEquals(20, $crawler->filter('.media')->count());
        // Assert every character as an image
        $this->assertEquals(20, $crawler->filter('.media img')->count());
    }
}
