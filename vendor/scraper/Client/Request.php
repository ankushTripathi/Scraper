<?php

namespace Scraper\Client;

class Request{

    public $method;
    public $url;
    public $header;
    public $payload;

    public function __construct($method, $url, $payload, $header = [])
    {
        //required fields
        $this->method = $method;
        $this->url = $url;
        $this->payload = $payload;
        $this->header = $header;
    }
}