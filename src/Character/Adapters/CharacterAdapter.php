<?php


namespace src\Character\Adapters;


use src\Character\Entities\Character;

class CharacterAdapter extends AdapterAbstract
{
    protected array $data;
    public function __construct(string $fullName)
    {
        parent::__construct();
        $this->data = [
            "query" => "mutation CreateCharacter {\n  insert_Character(objects: {name: \"{$fullName}\"}) {\n    returning {\n      id\n    }\n  }\n}",
            "operationName" => "CreateCharacter"
        ];
        $this->setHeader();
    }

    public function setHeader()
    {
        $this->headers = [
            'content-type' => 'application/json',
            'x-hasura-admin-secret' => 'uALQXDLUu4D9BC8jAfXgDBWm1PMpbp0pl5SQs4chhz2GG14gAVx5bfMs4I553keV'
        ];
    }

    public function getData()
    {
        return $this->data;
    }

    public function getUrl()
    {
        return Character::CHARACTER_URL;
    }
}
