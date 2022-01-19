<?php
namespace src\Character\Entities;

interface CharacterListInterface
{
    public function searchCharacterList();
    public function setCharacterList(array $list) : void;
    public function getCharacterList() : array;
}
