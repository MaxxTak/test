<?php
declare(strict_types = 1);

namespace src\Character\Entities;

use src\Character\Adapters\CharacterAdapter;
use src\Services\Request;

class Character implements CharacterInterface
{
    const CHARACTER_URL = 'https://backend-challenge.hasura.app/v1/graphql';

    private string $characterFirstName;
    private string $characterName;
    private string $characterUrl;

    private ?int $characterId;
    public Request $request;
    public CharacterAdapter $characterAdapter;

    public function __construct(string $name, string $url, string $firstName)
    {
        $this->setCharacterName($name);
        $this->setCharacterFirstName($firstName);
        $this->setCharacterUrl($url);
        $this->characterAdapter = new CharacterAdapter($name);
        $this->request = new Request($this->characterAdapter->getHeaders());
    }

    public function createCharacter(): Character
    {
        $response = $this->request->makeRequest(
            $this->characterAdapter->getUrl(),
            $this->characterAdapter->getData()
        );
        $this->characterId = $response->data->insert_Character->returning[0]->id;
        return $this;
    }

    public function setCharacterFirstName(string $name)
    {
        $this->characterFirstName = $name;
    }

    public function setCharacterName(string $name)
    {
        $this->characterName = $name;
    }

    public function setCharacterUrl(string $url)
    {
        $this->characterUrl = $url;
    }



    public function setCharacterId(int $id)
    {
        $this->characterId = $id;
    }

    public function getCharacterId()
    {
        return $this->characterId;
    }

    public function getCharacterFirstName()
    {
        return $this->characterFirstName;
    }
}
