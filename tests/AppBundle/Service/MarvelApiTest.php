<?php

namespace Tests\AppBundle\Objects;

use AppBundle\Objects\Character;
use AppBundle\Objects\Comic;
use AppBundle\Objects\Thumbnail;
use AppBundle\Service\MarvelApi;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MarvelApiTest extends WebTestCase
{
    /**
     * @var MarvelApi
     */
    protected $marvelApi;

    public function setUp()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $this->marvelApi = $kernel->getContainer()->get('marvel_api');
    }

    public function testGetCharacters()
    {
        $apiResult = $this->marvelApi->getCharacters(20,0);
        $this->assertContainsOnlyInstancesOf(Character::class, $apiResult);
        $this->assertEquals(20, count($apiResult));
    }

    public function testGetCharacter()
    {
        $apiResult = $this->marvelApi->getCharacter('1009489');
        $this->assertInstanceOf(Character::class, $apiResult);
    }

    public function testGetComicsForCharacter()
    {
        $apiResult = $this->marvelApi->getComicsForCharacter('1009489');
        $this->assertContainsOnlyInstancesOf(Comic::class, $apiResult);
    }
}
