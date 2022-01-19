<?php


namespace src\Character\Adapters;

use src\Character\Entities\QuoteList;

class QuoteListAdapter extends AdapterAbstract
{
    protected array $data;
    protected int $numberQuotes;
    public function __construct(array $data = [], $numberQuotes = QuoteList::NUMBER_QUOTES)
    {
        parent::__construct();
        $this->data = $data;
        $this->numberQuotes = $numberQuotes;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getUrl(string $firstname)
    {
        return QuoteList::QUOTE_LIST_URL. "{$firstname}/" . $this->numberQuotes;
    }

    public function getMethod()
    {
        return QuoteList::QUOTE_LIST_METHOD;
    }
}
