<?php

    include_once('config.inc.php');

    // Provides functionality to interact with the FreeAgent OAuth API.
    class FreeAgentApiOAuth extends FreeAgentApiBase
    {
        private $app_oauth_secret, $app_oauth_identifier;
        public $access_token, $token_type, $token_expiry;

        public function __construct($app_oauth_identifier, $app_oauth_secret)
        {
            $this->app_oauth_secret = $app_oauth_secret;
            $this->app_oauth_identifier = $app_oauth_identifier;

            parent::__construct(''); // We do not have an Access Token to pass yet.
        }

        // *************************
        // POST /v2/token_endpoint HTTP/1.1
        // Host: api.sandbox.freeagent.com
        // Content-length: 150
        // content-type: application/x-www-form-urlencoded
        // user-agent: google-oauth-playground
        // client_secret=[CLIENT-SECRET]&grant_type=refresh_token&refresh_token=[REFRESH-TOKEN]&client_id=[CLIENT-ID]
        // *************************
        public function refresh_access_token($refresh_token)
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/token_endpoint';
            $request['body'] = 'client_secret='. $this->app_oauth_secret .'&grant_type=refresh_token&refresh_token='. $refresh_token .'&client_id='. $this->app_oauth_identifier;
            $request['method'] = 'POST';
            $request['type'] = 'application/json';
            $request['oauth'] = true;
            
            if ($this->invoke_api($request))
            {
                $response_body_arr = json_decode($this->response['http_response_body'], true);

                $this->access_token = $response_body_arr['access_token'];
                $this->token_type = $response_body_arr['token_type'];
                $this->token_expiry = $response_body_arr['expires_in'];

                return true;
            }

            return false;
        }
    }

?>