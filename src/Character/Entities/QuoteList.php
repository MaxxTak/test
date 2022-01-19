<?php
declare(strict_types = 1);

namespace src\Character\Entities;


use src\Character\Adapters\QuoteListAdapter;
use src\Services\Request;

class QuoteList implements QuoteListInterface
{
    const QUOTE_LIST_URL = 'https://game-of-thrones-quotes.herokuapp.com/v1/author/';
    const QUOTE_LIST_METHOD = 'GET';
    const NUMBER_QUOTES = 2;
    public array $characterQuote;
    public string $characterName;
    public Request $request;
    public QuoteListAdapter $quoteListAdapter;

    public function __construct()
    {
        $this->quoteListAdapter = new QuoteListAdapter();
        $this->request = new Request($this->quoteListAdapter->getHeaders());
    }

    public function searchQuotes(string $firstName): self
    {
        $this->setQuotes(
            (array)$this->request->makeRequest(
                $this->quoteListAdapter->getUrl(strtolower($firstName)),
                $this->quoteListAdapter->getData(),
                $this->quoteListAdapter->getMethod()
            )
        );
        return $this;
    }

    public function setQuotes(array $quotes)
    {
        $this->characterQuote = $quotes;
    }

    public function getQuotes()
    {
        return $this->characterQuote;
    }
}
