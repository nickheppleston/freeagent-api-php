<?php

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	include_once('..\freeagent-api-base.class.php');
	include_once('..\freeagent-api-projects.class.php');

	// Create new project helper
    function create_project_array()
    {
		return (array(
			'project' => array(
			'name' => 'Test Project',
			'contact' => '/contacts/634', // Note that this is a relative path, not a FQN path.
			'budget' => 0,
			'is_ir35' => false,
			'status' => 'Active',
			'budget_units' => 'Monetary',
			'normal_billing_rate' => '5.00',
			'currency' => 'GBP',
			'created_at' => date('c')
		)));
    }

	// Update project helper
    function update_project_array()
    {
		return (array(
			'project' => array(
			'name' => 'Test Project',
			'contact' => '/contacts/634', // Note that this is a relative path.
			'budget' => 0,
			'is_ir35' => true, // Value to be changed in this update statement
			'status' => 'Active',
			'budget_units' => 'Monetary',
			'normal_billing_rate' => '5.00',
			'currency' => 'GBP',
			'created_at' => date('c')
		)));
    }



	//
	// Test Definition
	// 

	function get_projects_test()
	{
		$fa = new FreeAgentApiProjects('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');
		
		print '<h3><strong>Executing Get Projects Test...</strong></h3>';
		if ($fa->get_projects())
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fa->response['http_response_body'] .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}

	function get_project_test()
	{
		$fa = new FreeAgentApiProjects('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

		print '<h3><strong>Executing Get Contact Test...</strong></h3>';
		if ($fa->get_projects('655'))
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fa->response['http_response_body'] .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}

    function create_project_test()
    {
   		$fa = new FreeAgentApiProjects('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

		print '<h3><strong>Executing Create Project Test...</strong></h3>';
		if ($fa->create_project(json_encode(create_project_array())))
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fa->response['http_response_body'] .'</p>';
			print '<p style="color:green;"><strong># Contact Id:</strong> '. $fa->contact_id .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}

	function update_project_test()
	{
		$fa = new FreeAgentApiProjects('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

		// Create new contact to be updated
		if ($fa->create_project(json_encode(create_project_array())))
			$project_id = $fa->project_id;

		// Execute Update Test
		print '<h3><strong>Executing Update Project Test...</strong></h3>';
		if ($fa->update_project(json_encode(update_project_array()), $project_id))
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fa->response['http_response_body'] .'</p>';
			print '<p style="color:green;"><strong># Project Id:</strong> '. $fa->project_id .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}
 
	function delete_project_test()
	{
		$fa = new FreeAgentApiProjects('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

		// Create new project to be deleted
		if ($fa->create_project(json_encode(create_project_array())))
			$project_id = $fa->project_id;

		// Execute Delete Test
		print '<h3><strong>Executing Delete Project Test...</strong></h3>';
		if ($fa->delete_project($project_id))
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fa->response['http_response_body'] .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:red;"><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}


	// 
 	// Execute Tests
 	// 
 	get_projects_test();
 	get_project_test();
 	create_project_test();
 	update_project_test();
 	delete_project_test();

?>