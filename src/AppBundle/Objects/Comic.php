<?php

namespace AppBundle\Objects;


class Comic
{
    private $title;
    private $ressource;

    /**
     * Comic constructor.
     * @param $title
     * @param $ressource
     */
    public function __construct($title, $ressource)
    {
        $this->title = $title;
        $this->ressource = $ressource;
    }

    public static function createFromArray($comic)
    {
        return new self($comic['name'], $comic['resourceURI']);
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Comic
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getressource()
    {
        return $this->ressource;
    }

    /**
     * @param mixed $ressource
     * @return Comic
     */
    public function setressource($ressource)
    {
        $this->ressource = $ressource;
        return $this;
    }
}