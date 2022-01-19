<?php
namespace src\Character;

use src\Character\Entities\Character;

interface GenerateCharacterInterface
{
    public function generateCharacter() : void;
    public function generateCharacterQuotesList(Character $character) : array;

}
