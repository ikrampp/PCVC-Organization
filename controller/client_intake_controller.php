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

class ClientIntakeController {

	public function client_intake_details()
	{
		$client_details = new stdClass;
		$client_form_details = new stdClass;
		$error_message = "";

		if($_SERVER["REQUEST_METHOD"] != "POST")
		{
			echo "Form details are not submitted properly.";
		}

		if(isset($_POST['client_id']))
		{
			$client_details->client_id = $_POST['client_id'];
			$client_details->client_status = 'INTAKE';
			$client_form_details->client_id = $_POST['client_id'];
			$client_form_details->client_status = 'INTAKE';
		}
		else
		{
			$error_message = "Client ID is empty.";
		}
		if(isset($_POST['client_name']))
		{
			$client_details->client_name = $_POST['client_name'];
		}		
		else
		{
			$error_message = "Client Name is empty.";
		}
		if(isset($_POST['client_phonenumber']))
		{
			$client_details->client_phonenumber = $_POST['client_phonenumber'];
		}		
		else
		{
			$error_message = "Client Phone Number is empty.";
		}		
		if(isset($_POST['client_old_address']))
		{
			$client_details->client_address = $_POST['client_old_address'];
		}				
		if(isset($_POST['client_enrolled_by']))
		{
			$client_details->client_enrolled_by = $_POST['client_enrolled_by'];
		}
		
		$client_form_details->timestamp = date('Y-m-d');
		$client_form_details->form_json_data	= json_encode($_POST);

		$container = new stdClass;
		if(empty($error_message))
		{
			$container = $this->create_client_details($client_details);

			if(!isset($container->show_failure_message))
			{
				$container = $this->create_client_form_details($client_form_details);
				
			}
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
				$error_info["failure_message"] = "Username or Password is Invalid";
			}
		}

		return $container;
	}
	
	
	public function client_phone_followup_details()
	{
		$client_details = new stdClass;
		$client_form_details = new stdClass;
		$error_message = "";

		if($_SERVER["REQUEST_METHOD"] != "POST")
		{
			echo "Form details are not submitted properly.";
		}

		if(isset($_POST['client_id']))
		{
			$client_details->client_id = $_POST['client_id'];
			$client_details->client_status = 'PHONE_FOLLOWUP';
			$client_form_details->client_id = $_POST['client_id'];
			$client_form_details->client_status = 'PHONE_FOLLOWUP';
		}
		else
		{
			$error_message = "Client ID is empty.";
		}
		if(isset($_POST['phone_date']))
		{
			$client_details->phone_date = $_POST['phone_date'];
		}		
		else
		{
			$error_message = "Client Phone Date is empty.";
		}
		if(isset($_POST['last_phone_date']))
		{
			$client_details->last_phone_date = $_POST['last_phone_date'];
		}				
		if(isset($_POST['conversation']))
		{
			$client_details->client_address = $_POST['conversation'];
		}	
		if(isset($_POST['conversation_status']))
		{
			$client_details->conversation_status = $_POST['conversation_status'];
		}
		if(isset($_POST['client_wound_recovery']))
		{
			$client_details->client_wound_recovery = $_POST['client_wound_recovery'];
		}
		if(isset($_POST['client_sleeping_pattern']))
		{
			$client_details->client_sleeping_pattern = $_POST['client_sleeping_pattern'];
		}
		if(isset($_POST['client_emotional_status']))
		{
			$client_details->client_emotional_status = $_POST['client_emotional_status'];
		}
		if(isset($_POST['client_home_visit']))
		{
			$client_details->client_home_visit = $_POST['client_home_visit'];
		}
		if(isset($_POST['client_remarks']))
		{
			$client_details->client_remarks = $_POST['client_remarks'];
		}
		
		$client_form_details->timestamp = date('Y-m-d');
		$client_form_details->form_json_data	= json_encode($_POST);

		$container = new stdClass;
		if(empty($error_message))
		{
			$container = $this->update_client_details($client_details);

			if(!isset($container->show_failure_message))
			{
				$container = $this->create_client_form_details($client_form_details);
				
			}
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
				$error_info["failure_message"] = "Username or Password is Invalid";
			}
		}

		return $container;
	}
	
	public function client_hospital_discharge_details()
	{
		$client_details = new stdClass;
		$client_form_details = new stdClass;
		$error_message = "";

		if($_SERVER["REQUEST_METHOD"] != "POST")
		{
			echo "Form details are not submitted properly.";
		}

		if(isset($_POST['client_id']))
		{
			$client_details->client_id = $_POST['client_id'];
			$client_form_details->client_id = $_POST['client_id'];

			if(isset($_POST['client_discharge_critical']))
			{
			$client_form_details->client_status = (($_POST['client_discharge_critical'])=="Yes") ? 'DISCHARGE_CRITICAL' : 'DISCHARGE_NONCRITICAL';
			$client_details->client_status = (($_POST['client_discharge_critical'])=="Yes") ? 'DISCHARGE_CRITICAL' : 'DISCHARGE_NONCRITICAL';
			}
		}
		else
		{
			$error_message = "Client ID is empty.";
		}
		if(isset($_POST['client_name']))
		{
			$client_details->client_name = $_POST['client_name'];
		}		
		if(isset($_POST['hospital_discharge_date']))
		{
			$client_details->hospital_discharge_date = $_POST['hospital_discharge_date'];
		}			
		if(isset($_POST['hospital_stay_duration']))
		{
			$client_details->hospital_stay_duration = $_POST['hospital_stay_duration'];
		}
		if(isset($_POST['hospital_discharge_address']))
		{
			$client_details->hospital_discharge_address = $_POST['hospital_discharge_address'];
		}
		if(isset($_POST['client_discharge_critical']))
		{
			$client_details->client_discharge_critical = $_POST['client_discharge_critical'];
		}
		if(isset($_POST['hospital_discharge_summary']))
		{
			$client_details->hospital_discharge_summary = $_POST['hospital_discharge_summary'];
		}
		if(isset($_POST['client_enrolled_by']))
		{
			$client_details->client_enrolled_by = $_POST['client_enrolled_by'];
		}
		
		$client_form_details->timestamp = date('Y-m-d');
		$client_form_details->form_json_data	= json_encode($_POST);

		$container = new stdClass;
		if(empty($error_message))
		{
			$container = $this->update_client_details($client_details);

			if(!isset($container->show_failure_message))
			{
				$container = $this->create_client_form_details($client_form_details);
				
			}
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
				$error_info["failure_message"] = "Username or Password is Invalid";
			}
		}

		return $container;
	}

	
	public function get_next_client_id()
	{
		//Create a container object which will hold complete information required to display the complete order page
		$container = new stdClass();
	
		//Establish mysqli connection
		$mysqli_connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if ($mysqli_connection->connect_errno) {
			echo ("Failed to connect to MySQL: (" . $mysqli_connection->connect_errno . ") " . $mysqli_connection->connect_error);
			$container->show_failure_message = true;
			return $container;
		}	

		//Set auto-commit to FALSE explicitly
		if (!$mysqli_connection->autocommit(FALSE))
		{
			return;
		}
		
		$access = new ClientFormDetailsAccess($mysqli_connection);
		$next_id = $access->get_next_client_id();

		//Validate whether order loading is successful or not.
		if ($access->m_status == false || $access->m_status_code == STATUS_FETCH_NO_DATA)
		{
			$container->show_failure_message = true;
			//Close the connection
			$mysqli_connection->close();
			return $container;			
		}
		
		$container->next_client_id = $next_id;
		return $container;
	}

	public function create_client_details($client_details)
	{
		//Create a container object which will hold complete information required to display the complete order page
		$container = new stdClass();
	
		//Establish mysqli connection
		$mysqli_connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if ($mysqli_connection->connect_errno) {
			echo ("Failed to connect to MySQL: (" . $mysqli_connection->connect_errno . ") " . $mysqli_connection->connect_error);
			$container->show_failure_message = true;
			return $container;
		}	

		//Set auto-commit to FALSE explicitly
		if (!$mysqli_connection->autocommit(FALSE))
		{
			return;
		}
		
		$client_details_do = new ClientDetailsDO();
		$client_details_do->m_client_id = $client_details->client_id;
		$client_details_do->m_name = $client_details->client_name;
		$client_details_do->m_phonenumber = $client_details->client_phonenumber;
		$client_details_do->m_address = $client_details->client_address;
		$client_details_do->m_enrolled_by = $client_details->client_enrolled_by;
		$client_details_do->m_status = $client_details->client_status;
		
		$access = new ClientDetailsAccess($mysqli_connection);
		$success = $access->create_client_details($client_details_do);
		//Validate whether order loading is successful or not.
		if ($success == false)
		{
			$container->show_failure_message = true;
			//Close the connection
			$mysqli_connection->close();
			return $container;			
		}

		if ( !$mysqli_connection->commit() ) {
			$container->show_failure_message = true;
			$container->failure_message = "Sorry for the Inconvenience. We are unable to cancel this Order.";			
			$mysqli_connection->close();
			return $container;
		}		

		$container->success = true;
		return $container;
	}

	public function create_client_form_details($client_form_details)
	{
		//Create a container object which will hold complete information required to display the complete order page
		$container = new stdClass();
	
		//Establish mysqli connection
		$mysqli_connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if ($mysqli_connection->connect_errno) {
			echo ("Failed to connect to MySQL: (" . $mysqli_connection->connect_errno . ") " . $mysqli_connection->connect_error);
			$container->show_failure_message = true;
			return $container;
		}	

		//Set auto-commit to FALSE explicitly
		if (!$mysqli_connection->autocommit(FALSE))
		{
			return;
		}
		
		$client_form_details_do = new ClientFormDetailsDO();
		$client_form_details_do->m_client_id = $client_form_details->client_id;
		$client_form_details_do->m_form_json_data = $client_form_details->form_json_data;
		$client_form_details_do->m_timestamp = $client_form_details->timestamp;
		$client_form_details_do->m_status = $client_form_details->client_status;
		
		$access = new ClientFormDetailsAccess($mysqli_connection);
		$success = $access->create_client_form_details($client_form_details_do);

		//Validate whether order loading is successful or not.
		if ($success == false)
		{
			$container->show_failure_message = true;
			//Close the connection
			$mysqli_connection->close();
			return $container;			
		}
		
		if ( !$mysqli_connection->commit() ) {
			$container->show_failure_message = true;
			$container->failure_message = "Sorry for the Inconvenience. We are unable to cancel this Order.";			
			$mysqli_connection->close();
			return $container;
		}		

		$container->success = true;
		return $container;
	}
	
	public function update_client_details($client_details)
	{
		//Create a container object which will hold complete information required to display the complete order page
		$container = new stdClass();
	
		//Establish mysqli connection
		$mysqli_connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if ($mysqli_connection->connect_errno) {
			echo ("Failed to connect to MySQL: (" . $mysqli_connection->connect_errno . ") " . $mysqli_connection->connect_error);
			$container->show_failure_message = true;
			return $container;
		}	

		//Set auto-commit to FALSE explicitly
		if (!$mysqli_connection->autocommit(FALSE))
		{
			return;
		}
		
		$client_details_do = new ClientDetailsDO();
		$client_details_do->m_client_id = $client_details->client_id;
		$client_details_do->m_status = $client_details->client_status;
		
		$access = new ClientDetailsAccess($mysqli_connection);
		$success = $access->update_client_details($client_details_do);
		//Validate whether order loading is successful or not.
		if ($success == false)
		{
			$container->show_failure_message = true;
			//Close the connection
			$mysqli_connection->close();
			return $container;			
		}

		if ( !$mysqli_connection->commit() ) {
			$container->show_failure_message = true;
			$container->failure_message = "Sorry for the Inconvenience. We are unable to cancel this Order.";			
			$mysqli_connection->close();
			return $container;
		}		

		$container->success = true;
		return $container;
	}	
}
?>