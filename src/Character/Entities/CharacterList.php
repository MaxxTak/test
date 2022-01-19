<?php
declare(strict_types = 1);

namespace src\Character\Entities;


use src\Character\Adapters\CharacterListAdapter;
use src\Services\Request;

class CharacterList implements CharacterListInterface
{
    const CHARACTER_LIST_URL = 'https://thronesapi.com/api/v2/Characters';
    const CHARACTER_LIST_METHOD = 'GET';
    private array $characterList;
    public Request $request;
    public CharacterListAdapter $characterListAdapter;

    public function __construct()
    {
        $this->characterListAdapter = new CharacterListAdapter();
        $this->request = new Request($this->characterListAdapter->getHeaders());
    }

    public function searchCharacterList()
    {
        $this->setCharacterList(
            (array) $this->request->makeRequest(
                $this->characterListAdapter->getUrl(),
                $this->characterListAdapter->getData(),
                $this->characterListAdapter->getMethod()
            )
        );
        return $this;
    }

    public function setCharacterList(array $list) : void
    {
        $this->characterList = $list;
    }

    public function getCharacterList() : array
    {
        return $this->characterList;
    }
}
