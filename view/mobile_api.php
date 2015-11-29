<?php
require_once 'controller/mobile_app_api_controller.php';
//require_once 'controller/dbconfig.php';


function view_client_progress()
{
	$sw_user_details = new stdClass;
	$error_message = "";

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		// Populate user name from GET request
		if(isset($_GET['node']))
		{
			if(empty($_GET['node']))
				$error_message = $error_message . 'Invalid API </br>';
			
			$node = $_GET['node'];
			if($node == "client_progress_report")
			{
				if(isset($_GET['phone_number']))
				{
					if(empty($_GET['phone_number']))
						$error_message = $error_message . ' </br>';
				}
				
				$phone_number = $_GET['phone_number'];
				
				$access = new MobileAppClientAPIController();
				$data = $access->load_client_details_by_phone_number($phone_number);
				$client_details = json_encode($data);
				echo $client_details;
				
			}
			else
			{
				
			}
		}
	}
	else
		return;
}

view_client_progress();



?>