<?php

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	include_once('..\api\freeagent-api-base.class.php');
	include_once('..\api\freeagent-api-invoices.class.php');

	// Create new invoice helper
    function create_invoice_array()
    {
		return (array(
            'invoice' => array(
                'contact' => '/contacts/674', // Note that this is a relative path, not a FQN path.
                'dated_on' => date("c"),
                'currency' => 'GBP',
                'exchange_rate' => '1.0',
                'net_value' => '0.0',
                'status' => 'Draft',
                'omit_header' => false,
                'payment_terms_in_days' => 0,
                'comments' => 'This invoice has already been paid, thank-you.',
                'invoice_items' => array(array(
                    'description' => 'Initial subscription.',
                    'price' => '15.00',
                    'quantity' => '1.0',
                    'sales_tax_rate' => '20'
            	))
            )
        ));
    }

	// Update invoice helper
    function update_invoice_array()
    {
		return (array(
            'invoice' => array(
                'contact' => '/contacts/674', // Note that this is a relative path, not a FQN path.
                'dated_on' => date("c"),
                'currency' => 'GBP',
                'exchange_rate' => '1.0',
                'net_value' => '0.0',
                'status' => 'Draft',
                'omit_header' => false,
                'payment_terms_in_days' => 14, // Value to be changed in this update statement
                'comments' => 'This invoice has already been paid, thank-you.',
                'invoice_items' => array(array(
                    'description' => 'Initial subscription.',
                    'price' => '15.00',
                    'quantity' => '1.0',
                    'sales_tax_rate' => '20'
            	))
            )
        ));
    }

	// Send invoice helper
    function send_invoice_array()
    {
		return (array(
			'invoice' => array(
				'email' => array(
					'to' => 'to@invoice.com',		// Change 'to' to mimic your environment
					'from' => 'from@invoice.com',	// Change 'from' to mimic your environment
					'subject' => 'FreeAgent API Invoice Subject',
					'body' => 'FreeAgent API Invoice Body'
				)
			)
		));
    }    



	//
	// Test Definition
	// 

	function get_invoices_for_contact_test()
	{
		$fa = new FreeAgentApiInvoices('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');
		
		print '<h3><strong>Executing Get Invoices for Contact Test...</strong></h3>';
		if ($fa->get_invoices_for_contact('655'))
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

	
	function get_invoices_for_project_test()
	{
		$fa = new FreeAgentApiInvoices('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');
		
		print '<h3><strong>Executing Get Invoices for Project Test...</strong></h3>';
		if ($fa->get_invoices_for_project('104'))
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

	
	function get_invoices_test()
	{
		$fa = new FreeAgentApiInvoices('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');
		
		print '<h3><strong>Executing Get Invoices Test...</strong></h3>';
		if ($fa->get_invoices())
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
	
	
	function get_invoice_test()
	{
		$fa = new FreeAgentApiInvoices('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');
		
		print '<h3><strong>Executing Get Invoice Test...</strong></h3>';
		if ($fa->get_invoice('1122'))
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
	
	
	function get_invoice_timeline_test()
	{
		$fa = new FreeAgentApiInvoices('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');
		
		print '<h3><strong>Executing Get Invoice Timeline Test...</strong></h3>';
		if ($fa->get_invoice_timeline())
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


    function create_invoice_test()
    {
   		$fa = new FreeAgentApiInvoices('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

		print '<h3><strong>Executing Create Invoice Test...</strong></h3>';
		if ($fa->create_invoice(json_encode(create_invoice_array())))
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fa->response['http_response_body'] .'</p>';
			print '<p style="color:green;"><strong># Invoice Id:</strong> '. $fa->invoice_id .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:red;"><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}


    function update_invoice_test()
    {
   		$fa = new FreeAgentApiInvoices('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

		print '<h3><strong>Executing Update Invoice Test...</strong></h3>';
		if ($fa->create_invoice(json_encode(create_invoice_array())))
			$invoice_id = $fa->invoice_id;

		if ($fa->update_invoice(json_encode(update_invoice_array()), $invoice_id))
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fa->response['http_response_body'] .'</p>';
			print '<p style="color:green;"><strong># Invoice Id:</strong> '. $fa->invoice_id .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:red;"><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}


    function delete_invoice_test()
    {
   		$fa = new FreeAgentApiInvoices('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

		print '<h3><strong>Executing Delete Invoice Test...</strong></h3>';
		if ($fa->create_invoice(json_encode(create_invoice_array())))
			$invoice_id = $fa->invoice_id;

		if ($fa->delete_invoice($invoice_id))
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fa->response['http_response_body'] .'</p>';
			print '<p style="color:green;"><strong># Invoice Id:</strong> '. $fa->invoice_id .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:red;"><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}
 
    function send_invoice_test()
    {
   		$fa = new FreeAgentApiInvoices('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

		print '<h3><strong>Executing Send Invoice by E-mail Test...</strong></h3>';
		if ($fa->create_invoice(json_encode(create_invoice_array())))
			$invoice_id = $fa->invoice_id;

		if ($fa->send_invoice_by_email(json_encode(send_invoice_array()), $invoice_id))
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fa->response['http_response_body'] .'</p>';
			print '<p style="color:green;"><strong># Invoice Id:</strong> '. $fa->invoice_id .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:red;"><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}
	

    function mark_invoice_as_sent_test()
    {
   		$fa = new FreeAgentApiInvoices('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

		print '<h3><strong>Executing Mark Invoice as Sent Test...</strong></h3>';
		if ($fa->create_invoice(json_encode(create_invoice_array())))
			$invoice_id = $fa->invoice_id;

		if ($fa->mark_invoice_as_sent($invoice_id))
		{
			print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
			print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:green;"><strong># Response Body:</strong> '. $fa->response['http_response_body'] .'</p>';
			print '<p style="color:green;"><strong># Invoice Id:</strong> '. $fa->invoice_id .'</p>';
		}
		else
		{
			print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
			print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
			print '<p style="color:red;"><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
		}
	}

    
    // There appears to be an issue with these tests, omitting for the time-being.
 //    function mark_invoice_as_scheduled_test()
 //    {
 //   		$fa = new FreeAgentApiInvoices('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

	// 	print '<h3><strong>Executing Mark Invoice as Scheduled Test...</strong></h3>';
	// 	if ($fa->create_invoice(json_encode(create_invoice_array())))
	// 		$invoice_id = $fa->invoice_id;

	// 	if ($fa->mark_invoice_as_scheduled($invoice_id))
	// 	{
	// 		print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
	// 		print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
	// 		print '<p style="color:green;"><strong># Response Body:</strong> '. $fa->response['http_response_body'] .'</p>';
	// 		print '<p style="color:green;"><strong># Invoice Id:</strong> '. $fa->invoice_id .'</p>';
	// 	}
	// 	else
	// 	{
	// 		print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
	// 		print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
	// 		print '<p style="color:red;"><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
	// 	}
	// }	


 //    function mark_invoice_as_draft_test()
 //    {
 //   		$fa = new FreeAgentApiInvoices('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

	// 	print '<h3><strong>Executing Mark Invoice as Draft Test...</strong></h3>';
	// 	if ($fa->create_invoice(json_encode(create_invoice_array())))
	// 		$invoice_id = $fa->invoice_id;

	// 	if ($fa->mark_invoice_as_draft($invoice_id))
	// 	{
	// 		print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
	// 		print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
	// 		print '<p style="color:green;"><strong># Response Body:</strong> '. $fa->response['http_response_body'] .'</p>';
	// 		print '<p style="color:green;"><strong># Invoice Id:</strong> '. $fa->invoice_id .'</p>';
	// 	}
	// 	else
	// 	{
	// 		print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
	// 		print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
	// 		print '<p style="color:red;"><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
	// 	}
	// }	


 //    function mark_invoice_as_cancelled_test()
 //    {
 //   		$fa = new FreeAgentApiInvoices('1jzolXILs5XjAN9I2xrll7DSW1Ldgms4V2l48EH7E');

	// 	print '<h3><strong>Executing Mark Invoice as Cancelled Test...</strong></h3>';
	// 	if ($fa->create_invoice(json_encode(create_invoice_array())))
	// 		$invoice_id = $fa->invoice_id;

	// 	if ($fa->mark_invoice_as_cancelled($invoice_id))
	// 	{
	// 		print '<p style="color:green;"><strong># API Invoked Successfully</strong></p>';
	// 		print '<p style="color:green;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
	// 		print '<p style="color:green;"><strong># Response Body:</strong> '. $fa->response['http_response_body'] .'</p>';
	// 		print '<p style="color:green;"><strong># Invoice Id:</strong> '. $fa->invoice_id .'</p>';
	// 	}
	// 	else
	// 	{
	// 		print '<p style="color:red;"><strong># API *NOT* Invoked Successfully.</strong></p>';
	// 		print '<p style="color:red;"><strong># HTTP Status Response Code:</strong> '. $fa->response['http_response_status_code'] .'</p>';
	// 		print '<p style="color:red;"><strong># Error ('. $fa->error['error_source'] .'): '. $fa->error['error_message'] .'</strong></p>';
	// 	}
	// }	


	// 
 	// Execute Tests
 	// 
 	get_invoices_for_contact_test();
 	get_invoices_for_project_test();
 	get_invoices_test();
 	get_invoice_test();
 	get_invoice_timeline_test();
	create_invoice_test();
	update_invoice_test();
	delete_invoice_test();
	send_invoice_test();
	mark_invoice_as_sent_test();
	// mark_invoice_as_scheduled_test();
	// mark_invoice_as_draft_test();
	// mark_invoice_as_cancelled_test();

?>