<?php

namespace Scraper\Client;

class CurlClient implements IClient{

    protected $curl_handler;

    protected $postfield_http_methods = ["POST","PUT"];
    protected $no_response_body_http_methods = ["HEAD","OPTIONS"];

    public function __construct()
    {
        if(!extension_loaded('curl'))
        {
            return FALSE;
        }
    }

    public function processRequest(Request $request)
    {
        if(!filter_var($request->url, FILTER_VALIDATE_URL))
        {
			return FALSE;
		}

        if($scheme = parse_url($request->url, PHP_URL_SCHEME))
        {
			switch(strtolower($scheme)) {
				case 'http':
				case 'https': break;
				default: return FALSE;
            }
        }

        $this->curl_handler = curl_init();
    
        $response = new Response();
        $this->configureCurl($request,$response);

        try {

            $result = curl_exec($this->curl_handler);
            $response->status_code = curl_getinfo($this->curl_handler, CURLINFO_HTTP_CODE); 

        } catch (Exception $e) {
            
            if(curl_errno($this->curl_handler))
            {
                echo curl_error($this->curl_handler);
            }
        }
        finally{

            curl_close($this->curl_handler);
        }

        $response->payload = $result;
        return $response;
    }

    protected function configureCurl(Request $request,Response $response)
    {
        curl_setopt($this->curl_handler,CURLOPT_CUSTOMREQUEST,$request->method);
        curl_setopt($this->curl_handler,CURLOPT_URL,$request->url);
        curl_setopt($this->curl_handler,CURLOPT_RETURNTRANSFER,TRUE);
        curl_setopt($this->curl_handler,CURLOPT_FOLLOWLOCATION,TRUE);
        curl_setopt($this->curl_handler, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->curl_handler, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->curl_handler,CURLOPT_CONNECTTIMEOUT,$GLOBALS['_CONNECTION_TIMEOUT_']);
        curl_setopt($this->curl_handler,CURLOPT_HEADER,TRUE);
 
        curl_setopt($this->curl_handler, CURLOPT_HEADERFUNCTION,
            function($curl, $header) use (&$response)
            {
                $len = strlen($header);
                $header = explode(':', $header, 2);
                if (count($header) < 2) // ignore invalid headers
                return $len;

                $response->header[strtolower(trim($header[0]))][] = trim($header[1]);

                return $len;
            });
        
        if(is_array($request->header) && !empty($request->header))
        {
            curl_setopt($this->curl_handler, CURLOPT_HTTPHEADER, $request->header);
        }

        if(in_array($request->method,$this->postfield_http_methods))
        {
            $fields = (is_array($request->payload)) ? http_build_query($request->payload) : $request->paylaod; 
            curl_setopt($this->curl_handler, CURLOPT_POSTFIELDS, $fields); 
        }
        else if(in_array($request->method,$this->no_response_body_http_methods))
        {
            curl_setopt($this->curl_handler,CURLOPT_NOBODY ,TRUE);
        }
    }
}
