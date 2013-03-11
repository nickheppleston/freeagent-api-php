<?php

    // TODO:    Consider moving API_URL constant to base class and use a defaulted 'test' flag on 
    //          constructor to determine actual value.
    // TODO:    Consider using HTTP Response Code listed in API documentation to determine whether
    //          the response is correct.

    define('API_URL', 'https://api.sandbox.freeagent.com/v2');

    class FreeAgentApiContacts extends FreeAgentApiBase
    {
        public $contact_id;

        // GET https://api.freeagent.com/v2/contacts
        public function get_contacts()
        {
            $request['url'] = API_URL. '/contacts';
            $request['body'] = '';
            $request['method'] = 'GET';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }

        // GET https://api.freeagent.com/v2/contacts/:id
        public function get_contact($contact_id)
        {
            $request['url'] = API_URL. '/contacts/'. $contact_id;
            $request['body'] = '';
            $request['method'] = 'GET';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }

        // TODO: Create a Contact
        // POST https://api.freeagent.com/v2/contacts
        public function create_contact($json_request_data)
        {
            $request['url'] = API_URL. '/contacts';
            $request['body'] = $json_request_data;
            $request['method'] = 'POST';
            $request['type'] = 'application/json';
            
            if (($result = $this->invoke_api($request)) === true)
            {
                // Get generated Contact Id from response body
                // TODO: Move this to a common 'Get Resource' function.
                $contact_arr = json_decode($this->response['http_response_body'], true);
                $url_arr = explode('/', $contact_arr['contact']['url']);
                $this->contact_id = $url_arr[count($url_arr)-1];

                return true;
            }

            return false;
        }        

        // PUT https://api.freeagent.com/v2/contacts/:id
        public function update_contact($json_request_data, $contact_id)
        {
            $request['url'] = API_URL. '/contacts/'. $contact_id;
            $request['body'] = $json_request_data;
            $request['method'] = 'PUT';
            $request['type'] = 'application/json';
            
            return ($result = $this->invoke_api($request));
        }           

        // DELETE https://api.freeagent.com/v2/contacts/:id
        public function delete_contact($contact_id)
        {
            $request['url'] = API_URL. '/contacts/'. $contact_id;
            $request['body'] = '';
            $request['method'] = 'DELETE';
            $request['type'] = 'application/json';
            
            return ($result = $this->invoke_api($request));
        }  
    }

?>