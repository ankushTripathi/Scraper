<?php

namespace Scraper\Selector;

interface ISelectorAdapter{

    public function parse($response_body,$query);
}