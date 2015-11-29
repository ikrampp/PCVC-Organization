<?php

require_once 'model/client_form_details_info_access.php';
require_once 'model/client_form_details_info_do.php';
require_once 'model/client_details_info_access.php';
require_once 'model/client_details_info_do.php';
require_once 'model/sw_details_info_access.php';
require_once 'model/sw_details_info_do.php';
require_once 'controller/dbconfig.php';

class MobileAppClientAPIController {

	public function load_client_details_by_phone_number($phone_number)
	{
		//$client_details = array("Error"=> "Data Not Found", "status"=>"false");	
		//return $client_details;
		
		//Create a container object which will hold complete information required to display the complete order page
		$container = new stdClass();
	
		//Establish mysqli connection
		$mysqli_connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if ($mysqli_connection->connect_errno) {
			echo ("Failed to connect to MySQL: (" . $mysqli_connection->connect_errno . ") " . $mysqli_connection->connect_error);
			//$container->show_failure_message = true;
			return $container;
		}	

		//Set auto-commit to FALSE explicitly
		if (!$mysqli_connection->autocommit(FALSE))
		{
			return;
		}
		
		$access = new ClientDetailsAccess($mysqli_connection);
		$client_details = $access->load_by_client_phone_number($phone_number);

		//Validate whether order loading is successful or not.
		if ($access->m_status == false || $access->m_status_code == STATUS_FETCH_NO_DATA)
		{
			$container->show_failure_message = true;
			//Close the connection
			$mysqli_connection->close();
			$client_details = array("Error"=> "Data Not Found", "status"=>"false");			
		}
		
		return $client_details;
	}
	
	//$controller = new stdClass();
	//echo json_encode($controller->view_client_progress());
}
?>