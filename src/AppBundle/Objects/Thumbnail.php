<?php

namespace AppBundle\Objects;


class Thumbnail
{
    private $path;
    private $extension;

    /**
     * Thumbnail constructor.
     * @param $path
     * @param $extension
     */
    public function __construct($path, $extension)
    {
        $this->path = $path;
        $this->extension = $extension;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param mixed $extension
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }

    public function getStandardLarge()
    {
        return $this->getPath() . '/standard_large.' . $this->getExtension();
    }

    public function getDetail()
    {
        return $this->getPath() . '/detail.' . $this->getExtension();
    }
}