<?php

namespace src\Character\Entities;

interface CharacterInterface
{
    public function __construct(string $name, string $url, string $firstName);

    public function createCharacter(): Character;
}
