<?php

namespace Scraper\Client;

interface IClient{

    public function processRequest(Request $request);

}