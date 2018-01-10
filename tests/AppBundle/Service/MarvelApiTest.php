<?php

namespace Tests\AppBundle\Objects;

use AppBundle\Objects\Character;
use AppBundle\Objects\Comic;
use AppBundle\Objects\Thumbnail;
use AppBundle\Service\MarvelApi;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MarvelApiTest extends WebTestCase
{

    /*
     * Unirest is called statically in the service, mocking it is not possible as of this version of Symfony/PhpUnit
     * Tests relies on real calls of the API
     */

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

    // Assert MarvelApi::getCharacters() returns an array of Characters
    public function testGetCharacters()
    {
        $apiResult = $this->marvelApi->getCharacters(20,0);
        $this->assertContainsOnlyInstancesOf(Character::class, $apiResult);
        $this->assertEquals(20, count($apiResult));
    }

    // Assert MarvelApi::getCharacter() returns a Character
    public function testGetCharacter()
    {
        $apiResult = $this->marvelApi->getCharacter('1009489');
        $this->assertInstanceOf(Character::class, $apiResult);
    }

    // Assert MarvelApi::getComicsForCharacter() returns an array of Comics
    public function testGetComicsForCharacter()
    {
        $apiResult = $this->marvelApi->getComicsForCharacter('1009489');
        $this->assertContainsOnlyInstancesOf(Comic::class, $apiResult);
    }
}
