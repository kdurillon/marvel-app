<?php

namespace AppBundle\Objects;


class Comic
{
    private $title;
    private $resource;

    /**
     * Comic constructor.
     * @param $title
     * @param $resource
     */
    public function __construct($title, $resource)
    {
        $this->title = $title;
        $this->resource = $resource;
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
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param mixed $resource
     * @return Comic
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
        return $this;
    }
}