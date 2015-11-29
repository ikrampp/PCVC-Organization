<?php
if(!isset($_SESSION)){
    session_start();
}
// require_once 'pcvc/controller/sw_login.php';
require_once 'model/sw_details_info_access.php';
require_once 'model/sw_details_info_do.php';
require_once 'controller/dbconfig.php';

class SWLoginController {

	public function sw_user_login()
	{
		$sw_user_details = new stdClass;
		$error_message = "";

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			// Populate user name from POST request
			if(isset($_POST['user_name']))
			{
				if(empty($_POST['user_name']))
					$error_message = $error_message . 'Please provide valid User Name </br>';
				$sw_user_details->login_username = $_POST['user_name'];
			}
			// Populate password from POST request
			if(isset($_POST['password']))
			{
				if(empty($_POST['password']))		
					$error_message = $error_message . 'Please provide valid password </br>';
					$sw_user_details->password = $_POST['password'];
			}
		}
		else
		{
			$error_message = $error_message . 'Invalid Username / Password </br>';
		}
		
		$sw_user_login_container = new stdClass;
		if(empty($error_message))
		{
			$sw_user_login_container = $this->social_worker_login($sw_user_details);
		}
		
		if (!empty($error_message) || isset($sw_user_login_container->show_failure_message))
		{
			$error_info = array();
			$error_info["show_failure_message"] = true;
			
			if(!empty($error_message))
			{
				$sw_user_login_container->show_failure_message = true;
				$error_info["failure_message"] = $error_message;
			}
			else
			{
				$error_info["failure_message"] = "Username or Password is Invalid";
			}
			
			$_SESSION["error_info"] = $error_info;
			$redirect_info = array("UserName" => $sw_user_details->login_username, "Password" => $sw_user_details->password);
			$_SESSION["redirect_info"] = $redirect_info;
			$_SESSION['user_name'] = json_encode($sw_user_details->login_username);
			$_SESSION['password']  = json_encode($sw_user_details->password);
		}
		else
		{
					$soft_refresh_time = 1 * 60 * 60;
					$cookie_lifetime = $soft_refresh_time;		
					if(setcookie("admin_name", $sw_user_login_container->admin_name, (time()+$cookie_lifetime)))
					{
						$_COOKIE['admin_name'] = $sw_user_login_container->admin_name;
					}		
		}
		return $sw_user_login_container;
	}
	

	public function social_worker_login($login_container)
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
		
		$sw_details_info_do     = new SocialWorkerDetailsDO();
		$sw_details_info_access = new SocialWorkerDetailsAccess($mysqli_connection);
		$sw_details_info_do     = $sw_details_info_access->load_by_sw_details_phonenumber($login_container->login_username);

		//Validate whether order loading is successful or not.
		if ($sw_details_info_access->m_status == false || $sw_details_info_access->m_status_code == STATUS_FETCH_NO_DATA)
		{
			$container->show_failure_message = true;
			//Close the connection
			$mysqli_connection->close();
			return $container;			
		}
		
		//Password Validation
		if(strcmp($sw_details_info_do->m_password, $login_container->password))
		{
			$container->show_failure_message = true;
			//Close the connection
			$mysqli_connection->close();
			return $container;
		}

		$container->sw_user_loggedin = true;
		$container->admin_name = $sw_details_info_do->m_name;
		
		//everything is fine
		$mysqli_connection->commit();				
		//Close the connection
		$mysqli_connection->close();
		return $container;
	}	
}
?>