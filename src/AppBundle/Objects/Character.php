<?php

namespace AppBundle\Objects;


use AppBundle\Service\MarvelApi;

class Character
{
    private $id;
    private $name;
    private $description;
    private $thumbnail;

    /**
     * @var Comic[]
     */
    private $comics;
    private $comicsAvailable;

    /**
     * Character constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $thumbnail
     * @param Comic[] $comics
     * @param $comicsAvailable
     */
    public function __construct($id, $name, $description, $thumbnail, array $comics, $comicsAvailable)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->thumbnail = $thumbnail;
        $this->comics = $comics;
        $this->comicsAvailable = $comicsAvailable;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Character
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Character
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     * @return Character
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @return Comic[]
     */
    public function getComics()
    {
        return $this->comics;
    }

    /**
     * @param Comic[] $comics
     * @return Character
     */
    public function setComics($comics)
    {
        $this->comics = $comics;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComicsAvailable()
    {
        return $this->comicsAvailable;
    }

    /**
     * @param mixed $comicsAvailable
     */
    public function setComicsAvailable($comicsAvailable)
    {
        $this->comicsAvailable = $comicsAvailable;
    }

    public static function createFromArray($data)
    {
        $thumbnail = new Thumbnail($data['thumbnail']['path'], $data['thumbnail']['extension']);

        return new self(
            $data['id'],
            $data['name'],
            $data['description'],
            $thumbnail,
            [],
            $data['comics']['available']
        );
    }
}