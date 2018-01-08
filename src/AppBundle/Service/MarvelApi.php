<?php

namespace AppBundle\Service;

use AppBundle\Objects\Character;
use Symfony\Component\Serializer\Serializer;
use Unirest;

class MarvelApi
{
    private $publicKey;
    private $privateKey;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * MarvelApi constructor.
     * @param $publicKey
     * @param $privateKey
     */
    public function __construct($publicKey, $privateKey, $serializer)
    {
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
        $this->serializer = $serializer;
    }

    public function getCharacters($limit, $offset)
    {
        $headers = ['Accept' => 'application/json'];
        $query = $this->prepareQuery();
        $query['limit'] = $limit;
        $query['offset'] = $offset;
        $response = Unirest\Request::get('http://gateway.marvel.com/v1/public/characters', $headers, $query);
        $data = json_decode($response->raw_body, true);
        $list = $data['data']['results'];
        $characters = [];
        foreach ($list as $character) {
            $characters[] = Character::createFromArray($character);
        }

        return $characters;
    }

    public function getCharacter($id)
    {
        $headers = ['Accept' => 'application/json'];
        $query = $this->prepareQuery();
        $response = Unirest\Request::get('http://gateway.marvel.com/v1/public/characters/'.$id, $headers, $query);
        $data = json_decode($response->raw_body, true);

        $character = $data['data']['results'][0];
        return Character::createFromArray($character);
    }

    private function prepareQuery()
    {
        $query['apikey'] = $this->publicKey;
        $query['ts'] = time();
        $query['hash'] = md5($query['ts'].$this->privateKey.$this->publicKey);
        return $query;
    }

}