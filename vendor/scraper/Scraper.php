<?php

use Scraper\Client\IClient;
use Scraper\Client\Request;
use Scraper\Client\Response;

use Scraper\Selector\SelectorAdapter;
use Scraper\Selector\InvalidSelector;
use Scraper\Selector\HTMLSelector;
use Scraper\Selector\XMLSelector;
use Scraper\Selector\JSONSelector;


class Scraper{

    protected  $client;
    protected $selector_adapter;
    public $response_body;

    public function __construct(IClient $client)
    {
        $this->client = $client;
        $this->selector_adapter = new SelectorAdapter(new InvalidSelector());
    }

    public function request(Request $request)
    {
        try {
        
            $response = $this->client->processRequest($request);

        } catch (\Throwable $th) {
            //throw $th;
        }
        
        $this->response_body = $response->payload;
        $this->setSelectorAdapter($response);

        return $response;
    }

    public function parseResponse($query)
    {
        $result = FALSE;
        
        try {
        
            $result = $this->selector_adapter->parse($response_body,$query);

        } catch (\Throwable $th) {
            //throw $th;
        }
        
        return $result;
    }

    protected function setSelectorAdapter(Response $response)
    {
        $response_type = (!empty($response->header['Content-Type']))? $response->header['Content-Type'] : "";

        if(strpos($response_type,"html"))
        {
            $this->selector_adapter = new SelectorAdapter(new HTMLSelector());
        }
        else if(strpos($response_type,"xml"))
        {
            $this->selector_adapter = new SelectorAdapter(new XMLSelector());
        }
        else if(strpos($response_type,"json"))
        {
            $this->selector_adapter = new SelectorAdapter(new JSONSelector());
        }
    }
}