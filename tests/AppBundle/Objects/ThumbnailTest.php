<?php

namespace Tests\AppBundle\Objects;

use AppBundle\Objects\Character;
use AppBundle\Objects\Thumbnail;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ThumbnailTest extends WebTestCase
{
    public function testGetStandardLarge()
    {
        $this->assertEquals($this->getDummyThumbnail()->getStandardLarge(), 'PATH/standard_large.EXTENSION');
    }

    public function testGetDetail()
    {
        $this->assertEquals($this->getDummyThumbnail()->getDetail(), 'PATH/detail.EXTENSION');
    }

    private function getDummyThumbnail()
    {
        return new Thumbnail('PATH', 'EXTENSION');
    }
}
