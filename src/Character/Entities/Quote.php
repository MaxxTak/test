<?php


namespace src\Character\Entities;


use src\Character\Adapters\QuoteAdapter;
use src\Services\Request;

class Quote
{
    const CHARACTER_URL = 'https://backend-challenge.hasura.app/v1/graphql';
    private array $characterQuotes = [];
    public QuoteAdapter $quoteAdapter;
    public Request $request;

    public function __construct(array $quotes = [])
    {
        $this->setCharacterQuotes($quotes);
        $this->quoteAdapter = new QuoteAdapter();
        $this->request = new Request($this->quoteAdapter->getHeaders());
    }

    public function createQuotesForCharacter($characterId)
    {
        if(is_null($characterId)){
            return false;
        }
        foreach ($this->characterQuotes as $quote){
            $this->quoteAdapter->setData($quote->sentence, $characterId);
            $this->request->makeRequest(
                $this->quoteAdapter->getUrl(),
                $this->quoteAdapter->getData()
            );
        }
    }

    public function setCharacterQuotes(array $quotes)
    {
        $this->characterQuotes = $quotes;
    }

    public function getCharacterQuotes()
    {
        return $this->characterQuotes;
    }
}
