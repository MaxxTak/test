<?php
declare(strict_types = 1);

namespace src\Character;

use src\Character\Entities\Character;
use src\Character\Entities\CharacterList;
use src\Character\Entities\Quote;
use src\Character\Entities\QuoteList;

class GenerateCharacter implements GenerateCharacterInterface
{
    public CharacterList $characterList;
    public Quote $characterQuote;
    public QuoteList $quoteList;

    public function __construct()
    {
        $this->characterList = new CharacterList();
        $this->quoteList = new QuoteList();
        $this->characterQuote = new Quote();
    }

    public function generateCharacter() : void
    {
        $characters = $this->generateCharacterList();
        foreach ($characters as $character){
            $characterEntity = $this->createCharacter($character);
            $characterEntity->createCharacter();
            $this->generateCharacterQuotes($characterEntity);
        }
    }

    public function generateCharacterQuotes(Character $characterEntity)
    {
        $quotes = $this->generateCharacterQuotesList($characterEntity);
        $this->characterQuote->setCharacterQuotes($quotes);
        $this->characterQuote->createQuotesForCharacter($characterEntity->getCharacterId());
    }

    public function generateCharacterList()
    {
        return $this->characterList
            ->searchCharacterList()
            ->getCharacterList();
    }

    public function createCharacter($char) : Character
    {
        return $character = new Character(
            $char->fullName,
            $char->imageUrl,
            $char->firstName
        );
    }

    public function generateCharacterQuotesList(Character $character): array
    {
        return $this->quoteList
            ->searchQuotes($character->getCharacterFirstName())
            ->getQuotes();
    }
}
