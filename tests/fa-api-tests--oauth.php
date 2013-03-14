<?php

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	include_once('..\api\freeagent-api-base.class.php');
	include_once('..\api\freeagent-api-oauth.class.php');

	define('OAUTH_IDENT', 'hty7L6WigZZ6RgA7WVz6HQ');
	define('OAUTH_SECRET', 'XLWt9dpfdgexewqRBUldBA');
	define('OAUTH_REFRESH_TOKEN', '1S5mtxibHNwdG4x5hKYRASxuW5UWqKPdRHIVgGvh5');

	//
	// Test Definition
	// 

	function oauth_refresh_access_token_test()
	{
		$fao = new FreeAgentApiOAuth(OAUTH_IDENT, OAUTH_SECRET);
		
		print '<h3><strong>Executing Refresh Access Token Test...</strong></h3>';
		if ($fao->refresh_access_token(OAUTH_REFRESH_TOKEN))
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fao->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fao->response['http_response_body'] .'</p>';
			print '<p style="color:green;"><strong># OAuth Access Token:</strong> '. $fao->access_token .'</p>';
			print '<p style="color:green;"><strong># OAuth Token Type:</strong> '. $fao->token_type .'</p>';
			print '<p style="color:green;"><strong># OAUTH Token Expiry:</strong> '. $fao->token_expiry .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}


	// 
 	// Execute Tests
 	// 
 	oauth_refresh_access_token_test();

?>