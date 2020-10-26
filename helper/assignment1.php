<?php

require_once __DIR__."/constants.php";
require_once __DIR__."/../vendor/autoload.php";

use Scraper\Client\CurlClient;
use Scraper\Client\Request;

function getK2sProfileInfo(string $user_name,string $password) : array
{
	$result = array("status" => $GLOBALS['_ERROR_'] , "data" => array(), "error_msg" => "execution incomplete");

	$headers = [
		'Access-Control-Request-Method : POST',
		'Access-Control-Request-Headers : content-type',
		'Referer : https://k2s.cc/auth/login',
		'Origin : https://k2s.cc'
	];

	$scraper = new Scraper(new CurlClient());

	$scraper->request(new Request(
			"OPTIONS",
			'https://api.k2s.cc/v1/adn/visit',
			NULL,
			$headers
		));



	return $result;
}

?>
