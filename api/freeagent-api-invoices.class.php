<?php

    // TODO:    Consider using HTTP Response Code listed in API documentation to determine whether
    //          the response is correct.

    include_once('config.inc.php');

    class FreeAgentApiInvoices extends FreeAgentApiBase
    {
        // GET https://api.freeagent.com/v2/invoices?contact=https://api.freeagent.com/v2/contacts/[CONTACT-ID]
        public function get_invoices_for_contact($contact_id)
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/invoices?contact='. $GLOBALS['cfg']['api_url'] .'/contacts/'. $contact_id;
            $request['body'] = '';
            $request['method'] = 'GET';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }

        // GET https://api.freeagent.com/v2/invoices?project=https://api.freeagent.com/v2/projects/2        
        public function get_invoices_for_project($project_id)
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/invoices?project='. $GLOBALS['cfg']['api_url'] .'/projects/'. $project_id;
            $request['body'] = '';
            $request['method'] = 'GET';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }

        // GET https://api.freeagent.com/v2/invoices
        public function get_invoices()
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/invoices';
            $request['body'] = '';
            $request['method'] = 'GET';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }

        // GET https://api.freeagent.com/v2/invoices/:id 
        public function get_invoice($invoice_id)
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/invoices/'. $invoice_id;
            $request['body'] = '';
            $request['method'] = 'GET';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }

        // GET https://api.freeagent.com/v2/invoices/timeline
        public function get_invoice_timeline()
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/invoices/timeline';
            $request['body'] = '';
            $request['method'] = 'GET';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }        

        // POST https://api.freeagent.com/v2/invoices
        public function create_invoice($json_request_data)
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/invoices';
            $request['body'] = $json_request_data;
            $request['method'] = 'POST';
            $request['type'] = 'application/json';
            
            if (($result = $this->invoke_api($request)) === true)
            {
                // Get generated Invoice Id from response body
                // TODO: Move this to a common 'Get Resource' function.
                $contact_arr = json_decode($this->response['http_response_body'], true);
                $url_arr = explode('/', $contact_arr['invoice']['url']);
                $this->invoice_id = $url_arr[count($url_arr)-1];

                return true;
            }

            return false;
        }        

        // PUT https://api.freeagent.com/v2/invoices/:id
        public function update_invoice($json_request_data, $invoice_id)
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/invoices/'. $invoice_id;
            $request['body'] = $json_request_data;
            $request['method'] = 'PUT';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }

        // DELETE https://api.freeagent.com/v2/invoices/:id
        public function delete_invoice($invoice_id)
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/invoices/'. $invoice_id;
            $request['body'] = '';
            $request['method'] = 'DELETE';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }

        // POST https://api.freeagent.com/v2/invoices/:id/send_email
        public function send_invoice_by_email($json_request_data, $invoice_id)
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/invoices/'. $invoice_id .'/send_email';
            $request['body'] = $json_request_data;
            $request['method'] = 'POST';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }

        // PUT https://api.freeagent.com/v2/invoices/:id/transitions/mark_as_sent
        public function mark_invoice_as_sent($invoice_id)
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/invoices/'. $invoice_id .'/transitions/mark_as_sent';
            $request['body'] = '';
            $request['method'] = 'PUT';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }

        // 
        // There appears to be an issue with these API calls, omitting for the time-being.
        // 
        
        // PUT https://api.freeagent.com/v2/invoices/:id/transitions/mark_as_scheduled
        // public function mark_invoice_as_scheduled($invoice_id)
        // {
        //     $request['url'] = API_URL. '/invoices/'. $invoice_id .'/transitions/mark_as_scheduled';
        //     $request['body'] = '';
        //     $request['method'] = 'PUT';
        //     $request['type'] = 'application/json';
            
        //     return ($this->invoke_api($request));
        // }

        // PUT https://api.freeagent.com/v2/invoices/:id/transitions/mark_as_draft
        // public function mark_invoice_as_draft($invoice_id)
        // {
        //     $request['url'] = API_URL. '/invoices/'. $invoice_id .'/transitions/mark_as_draft';
        //     $request['body'] = '';
        //     $request['method'] = 'PUT';
        //     $request['type'] = 'application/json';
            
        //     return ($this->invoke_api($request));
        // }

        // PUT https://api.freeagent.com/v2/invoices/:id/transitions/mark_as_cancelled
        // public function mark_invoice_as_cancelled($invoice_id)
        // {
        //     $request['url'] = API_URL. '/invoices/'. $invoice_id .'/transitions/mark_as_cancelled';
        //     $request['body'] = '';
        //     $request['method'] = 'PUT';
        //     $request['type'] = 'application/json';
            
        //     return ($this->invoke_api($request));
        // }
    }

?>