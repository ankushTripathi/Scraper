<?php

namespace Scraper\Selector;

class InvalidSelector implements ISelectorAdapter{

    public function parse($response_body,$query)
    {
        return FALSE;
    }
}