<?php

namespace Tests\AppBundle\Objects;

use AppBundle\Objects\Character;
use AppBundle\Objects\Thumbnail;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CharacterTest extends WebTestCase
{
    public function testCreateFromArray()
    {
        $array = [
          'id' => 'ID',
          'name' => 'NAME',
          'description' => 'DESCRIPTION',
          'thumbnail' => [
              'path' => 'PATH',
              'extension' => 'EXTENSION'
          ],
          'comics' => [
              'available' => 0
          ]
        ];

        $stub = Character::createFromArray($array);
        $this->assertEquals($this->getDummyCharacter(), $stub);
    }

    private function getDummyCharacter()
    {
        $thumbnail = new Thumbnail('PATH', 'EXTENSION');
        $character = new Character(
            'ID',
            'NAME',
            'DESCRIPTION',
            $thumbnail,
            [],
            0
        );

        return $character;
    }
}
