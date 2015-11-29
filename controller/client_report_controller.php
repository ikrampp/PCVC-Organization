<?php
if(!isset($_SESSION)){
    session_start();
}
require_once 'model/client_form_details_info_access.php';
require_once 'model/client_form_details_info_do.php';
require_once 'model/client_details_info_access.php';
require_once 'model/sw_details_info_access.php';
require_once 'model/sw_details_info_do.php';
require_once 'controller/dbconfig.php';

class ClientReportController {

	public function load_client_details()
	{
		$client_details = new stdClass;
		$error_message = "";

		if(isset($_COOKIE) && isset($_COOKIE['admin_name']))
		{
			$client_details->client_enrolled_by = $_COOKIE['admin_name'];
		}
		else
		{
			$error_message = "Session is timed out. Please re-login.";
		}

		$container = new stdClass;
		if(empty($error_message))
		{
			$container = $this->load_client_details_by_enrolled_name($client_details);
		}
		
		if (!empty($error_message) || isset($container->show_failure_message))
		{
			$error_info = array();
			$error_info["show_failure_message"] = true;
			
			if(!empty($error_message))
			{
				$container->show_failure_message = true;
				$error_info["failure_message"] = $error_message;
			}
			else
			{
				$error_info["failure_message"] = "unable to load details";
			}
		}

		return $container;
	}
	
	public function load_client_details_by_enrolled_name($client_details)
	{
		//Create a container object which will hold complete information required to display the complete order page
		$container = new stdClass();
	
		//Establish mysqli connection
		$mysqli_connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if ($mysqli_connection->connect_errno) {
			$container->show_failure_message = true;
			$container->error_message = "Failed to connect to MySQL: (" . $mysqli_connection->connect_errno . ") " . $mysqli_connection->connect_error;
			return $container;
		}	

		$client_details_array = array();
		$access = new ClientDetailsAccess($mysqli_connection);
		$client_details_array = $access->load_client_details_by_enrolled_name($client_details->client_enrolled_by);
		
		//Validate whether order loading is successful or not.
		if ($access->m_status == false)
		{
			$container->show_failure_message = true;
			$container->error_message = "No Record found";
			//Close the connection
			$mysqli_connection->close();
			return $container;			
		}

		$container->success = true;
		$container->client_details_array = $client_details_array;
		return $container;
	}

	public function load_all_client_form_details_for_report()
	{
		$client_details = new stdClass;
		$error_message = "";

		$container = new stdClass;
		if(empty($error_message))
		{
			$container = $this->load_all_client_form_details();
		}
		
		if (!empty($error_message) || isset($container->show_failure_message))
		{
			$error_info = array();
			$error_info["show_failure_message"] = true;
			
			if(!empty($error_message))
			{
				$container->show_failure_message = true;
				$error_info["failure_message"] = $error_message;
			}
			else
			{
				$error_info["failure_message"] = "unable to load details";
			}
		}

		return $container;
	}

	public function load_all_client_form_details()
	{
		//Create a container object which will hold complete information required to display the complete order page
		$container = new stdClass();
	
		//Establish mysqli connection
		$mysqli_connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if ($mysqli_connection->connect_errno) {
			$container->show_failure_message = true;
			$container->error_message = "Failed to connect to MySQL: (" . $mysqli_connection->connect_errno . ") " . $mysqli_connection->connect_error;
			return $container;
		}	

		$client_form_details_array = array();
		$access = new ClientFormDetailsAccess($mysqli_connection);
		$client_form_details_array = $access->load_all_client_form_details();
		
		//Validate whether order loading is successful or not.
		if ($access->m_status == false)
		{
			$container->show_failure_message = true;
			$container->error_message = "No Record found";
			//Close the connection
			$mysqli_connection->close();
			return $container;			
		}

		$container->success = true;
		foreach($client_form_details_array as $row)
		{
			// $json = json_decode($row['form_json_data'],true);
			// $json['id'] = $row['id'];
			// $json['status'] = $row['status'];
			// $json['timestamp'] = $row['timestamp'];
			$container->client_form_details_array[] = $row;
		}
		return $container;
	}
	
}

?>