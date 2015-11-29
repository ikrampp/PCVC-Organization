<?php
require_once 'model/client_details_info_do.php';
require_once 'model/base_access.php';

class ClientFormDetailsAccess extends BaseAccess {

	private $m_db_connection;
	private $m_fields = "id, client_id, status, timestamp, form_json_data";
	private $m_fields_to_insert = "client_id, status, timestamp, form_json_data";

	function __construct($mysqli_connection) {
		$this->m_db_connection = $mysqli_connection;
		parent::__construct();
	}

	private function copy_client_form_details_data_to_client_form_details_do($client_form_details_result, $client_form_details_do) {
						$client_form_details_do->m_id= $client_form_details_result['id'];
						$client_form_details_do->m_client_id= $client_form_details_result['client_id'];
						$client_form_details_do->m_status= $client_form_details_result['status'];
						$client_form_details_do->m_timestamp= $client_form_details_result['timestamp'];
						$client_form_details_do->m_form_json_data= $client_form_details_result['form_json_data'];
	}
	
	function load_client_form_details_by_id($client_details_id){
		
		$this->m_status = false;

		$query = "SELECT $this->m_fields FROM client_form_details WHERE client_id = ?";
		
		if( !($query_stmt = $this->m_db_connection->prepare($query))) {
			$this->m_status_code = STATUS_PREPARE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return;
		}
		if( !$query_stmt->bind_param("i", $client_details_id) ) {
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

		$client_form_details_do = new ClientFormDetailsDO;
		if($client_form_details_result = $result_set->fetch_assoc()) {

			$this->m_status_code = STATUS_SUCCESS;
			$this->copy_client_details_data_to_client_details_info_do($client_form_details_result, $client_form_details_do);
		}

		$query_stmt->close();
		return $client_form_details_do;
	}

	function load_client_details_by_sw_id($client_detail_sw_id){
		
		$this->m_status = false;

		$query = "SELECT $this->m_fields FROM client_details WHERE client_id in (select client_id from sw_client_mapping where sw_id = ?)";
		
		if( !($query_stmt = $this->m_db_connection->prepare($query))) {
			$this->m_status_code = STATUS_PREPARE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return;
		}
		if( !$query_stmt->bind_param("i", $client_detail_sw_id) ) {
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

		$client_details_info_do = new ClientDetailsDO;
		if($client_details_info_result = $result_set->fetch_assoc()) {

			$this->m_status_code = STATUS_SUCCESS;
			$this->copy_client_details_data_to_client_details_info_do($client_details_info_result, $client_details_info_do);
		}

		$query_stmt->close();
		return $client_details_info_do;
	}

	function get_next_client_id()
	{
		$this->m_status = false;

		$query = "SELECT MAX(client_id) FROM client_details";
		
		if( !($query_stmt = $this->m_db_connection->prepare($query))) {
			$this->m_status_code = STATUS_PREPARE_FAILED;
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

		$next_id = 0;
		$client_details_info_do = new ClientDetailsDO;
		if($client_details_info_result = $result_set->fetch_assoc()) {

			$this->m_status_code = STATUS_SUCCESS;
			$next_id = $client_details_info_result['MAX(client_id)'] + 1;
		}

		$query_stmt->close();
		return $next_id;
	}
	
	function create_client_form_details($client_form_details_do){
		$this->m_status = false;

		$query = " INSERT INTO client_form_details ($this->m_fields_to_insert) VALUES(?,?,?,?);";

		if( !($query_stmt = $this->m_db_connection->prepare($query))) {
			$this->m_status_code = STATUS_PREPARE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "Failed to prepare query";
			return $this->m_status;
		}

		if( !$query_stmt->bind_param('isss',$client_form_details_do->m_client_id, $client_form_details_do->m_status, $client_form_details_do->m_timestamp, $client_form_details_do->m_form_json_data) )
		{
			$this->m_status_code = STATUS_BIND_PARAM_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "Failed to bind param";
			return $this->m_status;
		}
		if( !$query_stmt->execute() ) {
			$this->m_status_code = STATUS_EXECUTE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "Failed to execute query";
			return $this->m_status;
		}
		$query_stmt->close();

		$this->m_status = true;
		$this->m_status_code = STATUS_SUCCESS;

		return $this->m_status;
	}		

	function load_all_client_form_details(){
		
		$this->m_status = false;

		$query = "SELECT id, c.client_id client_id, c.status status, timestamp, form_json_data, name, address, phonenumber FROM client_form_details c, client_details d where c.client_id = d.client_id ";

		if( !($query_stmt = $this->m_db_connection->prepare($query))) {
			$this->m_status_code = STATUS_PREPARE_FAILED;
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

		$client_form_details_array = array();
		while($client_form_details_result = $result_set->fetch_assoc()) {

			$this->m_status_code = STATUS_SUCCESS;
			$client_form_details_array[] = $client_form_details_result;
		}

		$query_stmt->close();
		return $client_form_details_array;
	}

}
?>
