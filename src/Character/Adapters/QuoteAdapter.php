<?php


namespace src\Character\Adapters;


use src\Character\Entities\Character;

class QuoteAdapter extends AdapterAbstract
{
    protected array $data;
    public function __construct()
    {
        parent::__construct();
        $this->setHeader();
    }

    public function setData(string $quote, int $id)
    {
        $this->data = [
            "query" => "mutation CreateQuote {\n  insert_Quote(objects: {text: \"{$quote} \", character_id: {$id}}) {\n    returning {\n      id\n      text\n    }\n  }\n}\n",
            "operationName"=> "CreateQuote"
        ];
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
