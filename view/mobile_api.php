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
		if((isset($_GET['node']) && (isset($_GET['phone_number']))))
		{
			if(empty($_GET['node']) || empty($_GET['phone_number']))
			{
				$data = array("Error"=> "Invalid request", "status"=>"false");
				$data_details = json_encode($data);
				echo $data_details;
				return;
			}
			
			$node = $_GET['node'];
			$phone_number = $_GET['phone_number'];
			
			if($node == "client_progress_report")
			{								
				$access = new MobileAppClientAPIController();
				$data = $access->load_client_details_by_phone_number($phone_number);
			}
			else if($node == "sw_client_report")
			{
				$access = new MobileAppClientAPIController();
				$data = $access->load_clients_by_sw_details_phone_number($phone_number);
			}
			$data_details = json_encode($data);
			echo $data_details;
		}
	}
	else
		return;
}

view_client_progress();

?>