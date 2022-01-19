<?php

namespace src\Character\Adapters;

abstract class AdapterAbstract
{
    protected array $headers;

    public function __construct()
    {
        $this->headers = [
            'Content-Type' => 'application/json'
        ];
    }

    public function getHeaders()
    {
        return $this->headers;
    }
}
