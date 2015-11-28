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
						$sw_details_info_do->m_id= $sw_details_info_result['m_id'];
						$sw_details_info_do->m_login_username= $sw_details_info_result['m_login_username'];
						$sw_details_info_do->m_password= $sw_details_info_result['m_password'];
						$sw_details_info_do->m_name= $sw_details_info_result['m_name'];
						$sw_details_info_do->m_address= $sw_details_info_result['m_address'];
						$sw_details_info_do->m_city= $sw_details_info_result['m_city'];
						$sw_details_info_do->m_pincode= $sw_details_info_result['m_pincode'];
						$sw_details_info_do->m_phonenumber= $sw_details_info_result['m_phonenumber'];
						$sw_details_info_do->m_role= $sw_details_info_result['m_role'];
						$sw_details_info_do->m_timestamp= $sw_details_info_result['m_timestamp'];
	}

	function load_by_sw_details_id($sw_details_id){
		global $we_logger;
		$we_logger->info(" *** load_by_sw_details_id - start *** ");
		
		$this->m_status = false;

		$query = "SELECT $this->m_fields FROM social_worker_details_info WHERE id = ?";
		if( !($query_stmt = $this->m_db_connection->prepare($query))) {
			$this->m_status_code = STATUS_PREPARE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			$we_logger->error("Failed to prepare the query : ". $query . $error_message);
			return;
		}
		if( !$query_stmt->bind_param("i", $sw_details_id) ) {
			$this->m_status_code = STATUS_BIND_PARAM_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			$we_logger->error("Failed to bind the query : ". $query . $error_message);
			return;
		}
		if( !$query_stmt->execute() ) {
			$this->m_status_code = STATUS_EXECUTE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			$we_logger->error("Failed to execute the query : ". $query . $error_message);
			return;
		}
		if( !$result_set = $query_stmt->get_result() ) {
			$this->m_status_code = STATUS_GET_RESULT_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			$we_logger->error("Failed to get result from query : ". $query . $error_message);
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
		$we_logger->info(" *** load_by_sw_details_id - end *** ");
		return $sw_details_info_do;
	}

	function load_by_sw_details_phonenumber($sw_details_phonenumber) {
		global $we_logger;
		$we_logger->info(" *** load_by_sw_details_phonenumber - start *** ");

		$this->m_status = false;

		$query = "SELECT $this->m_fields FROM social_worker_details_info WHERE phonenumber = ?";
		if( !($query_stmt = $this->m_db_connection->prepare($query))) {
			$this->m_status_code = STATUS_PREPARE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			$we_logger->error("Failed to prepare the query : ". $query . $error_message);
			return;
		}
		if( !$query_stmt->bind_param("s", $sw_details_phonenumber) ) {
			$this->m_status_code = STATUS_BIND_PARAM_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			$we_logger->error("Failed to bind the query : ". $query . $error_message);
			return;
		}
		if( !$query_stmt->execute() ) {
			$this->m_status_code = STATUS_EXECUTE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			$we_logger->error("Failed to execute the query : ". $query . $error_message);
			return;
		}
		if( !$result_set = $query_stmt->get_result() ) {
			$this->m_status_code = STATUS_GET_RESULT_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			$we_logger->error("Failed to get result from query : ". $query . $error_message);
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
		$we_logger->info(" *** load_by_sw_details_phonenumber - end *** ");
		return $sw_details_info_do;
	}
}
?>
