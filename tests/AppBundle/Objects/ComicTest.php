<?php

namespace Tests\AppBundle\Objects;

use AppBundle\Objects\Character;
use AppBundle\Objects\Comic;
use AppBundle\Objects\Thumbnail;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ComicTest extends WebTestCase
{
    public function testCreateFromArray()
    {
        $array = [
          'title' => 'TITLE',
          'resourceURI' => 'RESOURCE'
        ];

        $stub = Comic::createFromArray($array);
        $this->assertEquals($this->getDummyComic(), $stub);
    }

    private function getDummyComic()
    {
        return new Comic(
            'TITLE',
            'RESOURCE'
        );
    }
}
