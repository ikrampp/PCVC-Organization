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
		//Establish mysqli connection
		$mysqli_connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if ($mysqli_connection->connect_errno) {
			echo ("Failed to connect to MySQL: (" . $mysqli_connection->connect_errno . ") " . $mysqli_connection->connect_error);
			$client_details = array("Error"=> "Database error occured", "status"=>"false");	
			return $client_details;
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
			//Close the connection
			$mysqli_connection->close();
			//$client_details = array("Error"=> "Data Not Found", "status"=>"false");			
		}		
		return $client_details;
	}
	
	public function load_clients_by_sw_details_phone_number($phone_number)
	{
		//Establish mysqli connection
		$mysqli_connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if ($mysqli_connection->connect_errno) {
			echo ("Failed to connect to MySQL: (" . $mysqli_connection->connect_errno . ") " . $mysqli_connection->connect_error);
			$sw_details = array("Error"=> "Database error occured", "status"=>"false");	
			return $sw_details;
		}	

		//Set auto-commit to FALSE explicitly
		if (!$mysqli_connection->autocommit(FALSE))
		{
			return;
		}
		
		$access = new SocialWorkerDetailsAccess($mysqli_connection);
		$sw_details = $access->load_clients_by_sw_phone_number($phone_number);

		//Validate whether order loading is successful or not.
		if ($access->m_status == false || $access->m_status_code == STATUS_FETCH_NO_DATA)
		{
			//Close the connection
			$mysqli_connection->close();
		}		
		return $sw_details;
	}
	

}
?>