<?php
namespace src\Character\Entities;

interface QuoteListInterface
{
    public function searchQuotes(string $firstName) : QuoteList;
}
