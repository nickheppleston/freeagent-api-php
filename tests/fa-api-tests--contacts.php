<?php

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	include_once('..\api\freeagent-api-base.class.php');
	include_once('..\api\freeagent-api-contacts.class.php');

	// Create new contact helper
    function create_contact_array()
    {
    	return (array('contact' => array(
			'first_name' => 'Tom',
			'last_name' => 'Jones',
			'email' => 'tom.jones@tomjones.com',
			'organisation_name' => 'Tom Jones Singing Ltd',
			'billing_email' => 'billing@tomjones.com',
			'address1' => '1 Singing Street',
			'address2' => 'Cloud Avenue',
			'address3' => 'Wet Road',
			'town' => 'London',
			'region' => 'Bow Green',
			'postcode' => 'S1 1PW',
			'country' => 'United Kingdom',
			'contact_name_on_invoices' => true,
			'locale' => 'en',
			'uses_contact_invoice_sequence' => false,
			'created_at' => date("c")
		)));
    }

	// Update contact helper
    function update_contact_array()
    {
    	return (array('contact' => array(
			'first_name' => 'Bob', // Value changed
			'last_name' => 'Dylan', // Value changed
			'email' => 'tom.jones@tomjones.com',
			'organisation_name' => 'Tom Jones Singing Ltd',
			'billing_email' => 'billing@tomjones.com',
			'address1' => '1 Singing Street',
			'address2' => 'Cloud Avenue',
			'address3' => 'Wet Road',
			'town' => 'London',
			'region' => 'Bow Green',
			'postcode' => 'S1 1PW',
			'country' => 'United Kingdom',
			'contact_name_on_invoices' => true,
			'locale' => 'en',
			'uses_contact_invoice_sequence' => false,
			'created_at' => date("c")
		)));
    }



	//
	// Test Definition
	// 

	function get_contacts_test()
	{
		$fac = new FreeAgentApiContacts('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');
		
		print '<h3><strong>Executing Get Contacts Test...</strong></h3>';
		if ($fac->get_contacts())
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fac->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fac->response['http_response_body'] .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:red;"><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}

	function get_contact_test()
	{
		$fac = new FreeAgentApiContacts('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

		print '<h3><strong>Executing Get Contact Test...</strong></h3>';
		if ($fac->get_contact('655'))
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fac->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fac->response['http_response_body'] .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:red;"><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}

    function create_contact_test()
    {
   		$fac = new FreeAgentApiContacts('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

		print '<h3><strong>Executing Create Contact Test...</strong></h3>';
		if ($fac->create_contact(json_encode(create_contact_array())))
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fac->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fac->response['http_response_body'] .'</p>';
			print '<p style="color:green;"><strong># Contact Id:</strong> '. $fac->contact_id .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:red;"><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}

	function update_contact_test()
	{
		$fac = new FreeAgentApiContacts('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

		// Create new contact to be updated
		if ($fac->create_contact(json_encode(create_contact_array())))
			$contact_id = $fac->contact_id;

		// Execute Update Test
		print '<h3><strong>Executing Update Contact Test...</strong></h3>';
		if ($fac->update_contact(json_encode(update_contact_array()), $contact_id))
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fac->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fac->response['http_response_body'] .'</p>';
			print '<p style="color:green;"><strong># Contact Id:</strong> '. $fac->contact_id .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:red;"><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}
 
	function delete_contact_test()
	{
		$fac = new FreeAgentApiContacts('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

		// Create new contact to be deleted
		if ($fac->create_contact(json_encode(create_contact_array())))
			$contact_id = $fac->contact_id;

		// Execute Delete Test
		print '<h3><strong>Executing Delete Contact Test...</strong></h3>';
		if ($fac->delete_contact($contact_id))
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fac->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fac->response['http_response_body'] .'</p>';
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
 	get_contacts_test();
 	get_contact_test();
 	create_contact_test();
 	update_contact_test();
 	delete_contact_test();

?>