<?php

    abstract class FreeAgentApiBase
    {
        private $debug;
        protected $oauth_access_token;
        protected $api_url;
        protected $ch;
        public $response;
        public $error;

        public function __construct($oauth_access_token, $debug = false)
        {
            $this->debug = $debug;
            $this->oauth_access_token = $oauth_access_token;
            $this->ch = curl_init();

            // Instanciate API response array
            $this->response = array( 
                    'http_response_headers' => '', 
                    'http_response_body' => '', 
                    'http_response_status_code' => ''
                );

            // Instanciate error array
            $this->error = array(
                    'error_source' => '',
                    'error_message' => ''
                );

        }

        private function print_debug($debug_stmt)
        {
            if ($this->debug)
                print $debug_stmt;
        }

        private function http_parse_headers($headers=false)
        {
            if($headers === false){
                return false;
            }
        
            $headers = str_replace("\r","",$headers);
            $headers = explode("\n",$headers);
            
            foreach($headers as $value)
            {
                $header = explode(": ",$value);
                
                // var_dump($header);

                if(($header[0]) && (!isset($header[1])))
                {
                    $headerdata['status'] = $header[0];
                }
                if(($header[0]) && (isset($header[1])))
                {
                    $headerdata[$header[0]] = $header[1];
                }
            }

            return $headerdata;
        }

        protected function invoke_api($request)
        {
            // Setup API request
            curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($this->ch, CURLOPT_URL, $request['url']);
            curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, $request['method']);
            curl_setopt($this->ch, CURLOPT_USERAGENT, 'PHP Script');
            curl_setopt($this->ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer ". $this->oauth_access_token,
                "Accept: ". $request['type'],
                "Content-type: ". $request['type'],
                //"Content-length:". strlen($request['body']),
            ));
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);   
            curl_setopt($this->ch, CURLOPT_HEADER, 1);           
            curl_setopt($this->ch, CURLOPT_VERBOSE, 1);
            
            $this->print_debug('Request Data *Body*: '. $request['body']);

            if (isset($request['body'])) {
                curl_setopt($this->ch, CURLOPT_POSTFIELDS, $request['body']);
            }

            // Invoke API
            $response = curl_exec($this->ch);
            
            // Parse CUrl for errors invoking the API
            if (($error = curl_error($this->ch)) != '')
            {
                $this->error['error_source'] = "CUrl";
                $this->error['error_message'] = $error;
                return false;
            }

            // Parse API resonse
            $response_header_size = curl_getinfo($this->ch, CURLINFO_HEADER_SIZE);
            $this->response['http_response_headers'] = $this->http_parse_headers(substr($response, 0, $response_header_size));
            $this->response['http_response_body'] = substr( $response, $response_header_size);
            $this->response['http_response_status_code'] = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);

            // Parse response body for errors raise by the API
            // Error message will be JSON, e.g. '{"errors":{"error":{"message":"Access token not recognised"}}}''
            $error_arr = json_decode($this->response['http_response_body'], true);
            if (isset($error_arr['errors']))
            {
                $this->error['error_source'] = "FreeAgentAPI";
                $this->error['error_message'] = $error_arr['errors'][0]['message'];
                return false;
            }

            // DEBUGGING
            $this->print_debug('<p>**DEBUGGING**</p>');
            $this->print_debug("<p><strong>Headers Array:</strong></p>");
            // var_dump($this->response['http_response_headers']);
            // print "<p>Headers ETag: ". $this->response['http_response_headers']['ETag'] .'</p>';
            $this->print_debug("<p><strong>Body:</strong></p>");
            $this->print_debug($this->response['http_response_body']);
            $this->print_debug('<p><strong>HTTP Status Response Code:</strong> '. $this->response['http_response_status_code'] .'</p>');
            // print "<br />Last URL: ". $result['last_url'];
            $this->print_debug('<p>**DEBUGGING**</p>');
            // DEBUGGING

            return true;
        }
    }

?>