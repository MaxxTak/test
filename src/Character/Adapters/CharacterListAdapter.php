<?php


namespace src\Character\Adapters;

use src\Character\Entities\CharacterList;

class CharacterListAdapter extends AdapterAbstract
{
    protected array $data;
    public function __construct(array $data = [])
    {
        parent::__construct();
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getUrl()
    {
        return CharacterList::CHARACTER_LIST_URL;
    }

    public function getMethod()
    {
        return CharacterList::CHARACTER_LIST_METHOD;
    }
}
