<?php
require_once 'model/sw_details_info_do.php';
require_once 'model/base_access.php';

class SocialWorkerDetailsAccess extends BaseAccess {

	private $m_db_connection;
	private $m_fields = "id, login_username, password, name, address, city, pincode, phonenumber, role, timestamp";
	private $m_fields_to_insert = "login_username, password, name, address, city, pincode, phonenumber, role, timestamp";

	function __construct($mysqli_connection) {
		$this->m_db_connection = $mysqli_connection;
		parent::__construct();
	}

	private function copy_sw_details_data_to_sw_details_info_do($sw_details_info_result, $sw_details_info_do) {
						$sw_details_info_do->m_id= $sw_details_info_result['id'];
						$sw_details_info_do->m_login_username= $sw_details_info_result['login_username'];
						$sw_details_info_do->m_password= $sw_details_info_result['password'];
						$sw_details_info_do->m_name= $sw_details_info_result['name'];
						$sw_details_info_do->m_address= $sw_details_info_result['address'];
						$sw_details_info_do->m_city= $sw_details_info_result['city'];
						$sw_details_info_do->m_pincode= $sw_details_info_result['pincode'];
						$sw_details_info_do->m_phonenumber= $sw_details_info_result['phonenumber'];
						$sw_details_info_do->m_role= $sw_details_info_result['role'];
						$sw_details_info_do->m_timestamp= $sw_details_info_result['timestamp'];
	}

	function load_by_sw_details_id($sw_details_id){
	
		$this->m_status = false;

		$query = "SELECT $this->m_fields FROM social_worker_details WHERE id = ?";
		if( !($query_stmt = $this->m_db_connection->prepare($query))) {
			$this->m_status_code = STATUS_PREPARE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return;
		}
		if( !$query_stmt->bind_param("i", $sw_details_id) ) {
			$this->m_status_code = STATUS_BIND_PARAM_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return;
		}
		if( !$query_stmt->execute() ) {
			$this->m_status_code = STATUS_EXECUTE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return;
		}
		if( !$result_set = $query_stmt->get_result() ) {
			$this->m_status_code = STATUS_GET_RESULT_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return;
		}

		$this->m_status = true;
		$this->m_status_code = STATUS_FETCH_NO_DATA;

		$sw_details_info_do = new SocialWorkerDetailsDO;
		if($sw_details_info_result = $result_set->fetch_assoc()) {

			$this->m_status_code = STATUS_SUCCESS;
			$this->copy_sw_details_data_to_sw_details_info_do($sw_details_info_result, $sw_details_info_do);
		}

		$query_stmt->close();
		return $sw_details_info_do;
	}

	function load_by_sw_details_phonenumber($sw_details_phonenumber) {

		$this->m_status = false;

		$query = "SELECT $this->m_fields FROM social_worker_details WHERE phonenumber = ?";
		if( !($query_stmt = $this->m_db_connection->prepare($query))) {
			$this->m_status_code = STATUS_PREPARE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return;
		}
		if( !$query_stmt->bind_param("s", $sw_details_phonenumber) ) {
			$this->m_status_code = STATUS_BIND_PARAM_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return;
		}
		if( !$query_stmt->execute() ) {
			$this->m_status_code = STATUS_EXECUTE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return;
		}
		if( !$result_set = $query_stmt->get_result() ) {
			$this->m_status_code = STATUS_GET_RESULT_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return;
		}

		$this->m_status = true;
		$this->m_status_code = STATUS_FETCH_NO_DATA;

		$sw_details_info_do = new SocialWorkerDetailsDO;
		if($sw_details_info_result = $result_set->fetch_assoc()) {
			$this->m_status_code = STATUS_SUCCESS;
			$this->copy_sw_details_data_to_sw_details_info_do($sw_details_info_result, $sw_details_info_do);
		}

		$query_stmt->close();
		return $sw_details_info_do;
	}
}
?>
