<?php

namespace AppBundle\Objects;


class Hero
{
    private $id;
    private $name;
    private $description;
    private $thumbnail;

    /**
     * @var Comic[]
     */
    private $comics;

    /**
     * Hero constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $thumbnail
     * @param Comic[] $comics
     */
    public function __construct($id, $name, $description, $thumbnail, array $comics)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->thumbnail = $thumbnail;
        $this->comics = $comics;
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
     * @return Hero
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
     * @return Hero
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getthumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     * @return Hero
     */
    public function setthumbnail($thumbnail)
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
     * @return Hero
     */
    public function setComics($comics)
    {
        $this->comics = $comics;
        return $this;
    }

    public static function createFromArray($data)
    {
        $comics = [];
        foreach ($data['comics']['items'] as $comic) {
            $comics[] = Comic::createFromArray($comic);
        }

        return new self(
            $data['id'],
            $data['name'],
            $data['description'],
            $data['thumbnail'],
            $comics
        );
    }
}