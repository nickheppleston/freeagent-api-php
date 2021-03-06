<?php

    // TODO:    Consider using HTTP Response Code listed in API documentation to determine whether
    //          the response is correct.

    include_once('config.inc.php');

    class FreeAgentApiProjects extends FreeAgentApiBase
    {
        // GET https://api.freeagent.com/v2/projects
        public function get_projects()
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/projects';
            $request['body'] = '';
            $request['method'] = 'GET';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }

        // GET https://api.freeagent.com/v2/projects/:id
        public function get_project($project_id)
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/projects/'. $project_id;
            $request['body'] = '';
            $request['method'] = 'GET';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }

        // POST https://api.freeagent.com/v2/projects
        public function create_project($json_request_data)
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/projects/';
            $request['body'] = $json_request_data;
            $request['method'] = 'POST';
            $request['type'] = 'application/json';
            
            if (($result = $this->invoke_api($request)) === true)
            {
                // Get generated Project Id from response body
                // TODO: Move this to a common 'Get Resource' function.
                $contact_arr = json_decode($this->response['http_response_body'], true);
                $url_arr = explode('/', $contact_arr['project']['url']);
                $this->project_id = $url_arr[count($url_arr)-1];

                return true;
            }

            return false;
        }

        // PUT https://api.freeagent.com/v2/projects/:id
        public function update_project($json_request_data, $project_id)
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/projects/'. $project_id;
            $request['body'] = $json_request_data;
            $request['method'] = 'PUT';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }

        // DELETE https://api.freeagent.com/v2/projects/:id
        public function delete_project($project_id)
        {
            $request['url'] = $GLOBALS['cfg']['api_url'] .'/projects/'. $project_id;
            $request['body'] = '';
            $request['method'] = 'DELETE';
            $request['type'] = 'application/json';
            
            return ($this->invoke_api($request));
        }
    }

?>