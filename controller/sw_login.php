<?php

require_once 'model/sw_details_info_access.php';
require_once 'model/sw_details_info_do.php';
require_once 'controller/dbconfig.php';

class SocialWorkerLogin
{
	function social_worker_login($login_container)
	{
		//Create a container object which will hold complete information required to display the complete order page
		$container = new stdClass();
	
		//Establish mysqli connection
		$mysqli_connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if ($mysqli_connection->connect_errno) {
			echo ("Failed to connect to MySQL: (" . $mysqli_connection->connect_errno . ") " . $mysqli_connection->connect_error);
			$container->show_failure_message = true;
			$container->destination_page = LOGIN_PAGE;		
			return $container;
		}	
		
		//Set auto-commit to FALSE explicitly
		if (!$mysqli_connection->autocommit(FALSE))
		{
			echo ("Failed to turn off auto-commit to false");
		}
		
		$sw_details_info_do     = new SocialWorkerDetailsDO();
		$sw_details_info_access = new SocialWorkerDetailsAccess($mysqli_connection);
		$sw_details_info_do     = $sw_details_info_access->load_by_sw_details_phonenumber($login_container->login_username);
		//Validate whether order loading is successful or not.
		if ($sw_details_info_access->m_status == false || $sw_details_info_access->m_status_code == STATUS_FETCH_NO_DATA)
		{
			echo ("Failed to load Admin details for the Admin User Name - " . $admin_login_container->user_name);
			$container->show_failure_message = true;
			$container->destination_page = LOGIN_PAGE;
			//Close the connection
			$mysqli_connection->close();
			return $container;			
		}
			
		//Password Validation
		if(!strcmp($sw_details_info_do->password, $login_container->password))
		{
			echo ("User Authentication Successful.");
		}
		else
		{
			echo ("User Authentication Failed. Password Mismatch.");
			$container->show_failure_message = true;
			$container->destination_page = ADMIN_LOGIN_PAGE;
			//Close the connection
			$mysqli_connection->close();
			return $container;
		}

		$container->sw_user_loggedin = true;
		$container->sw_user_name = $sw_details_info_do->m_name;
		
		//everything is fine
		$mysqli_connection->commit();				
		//Close the connection
		$mysqli_connection->close();
		return $container;
	}
}
?>