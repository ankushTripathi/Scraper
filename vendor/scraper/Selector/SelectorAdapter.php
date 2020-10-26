<?php

namespace Scraper\Selector;

class SelectorAdapter implements ISelectorAdapter{

    protected $selector;

    public function __construct(ISelectorAdapter $selector)
    {
        $this->selector = $selector;
    }

    public function parse($response_body,$query)
    {
        return $this->selector->parse($response_body,$query,$strategy);
    }
}