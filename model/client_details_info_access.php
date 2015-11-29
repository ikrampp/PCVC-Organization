<?php
require_once 'model/client_details_info_do.php';
require_once 'model/base_access.php';

class ClientDetailsAccess extends BaseAccess {

	private $m_db_connection;
	private $m_fields = "client_id,name,address,phonenumber,enrolled_by,status";

	function __construct($mysqli_connection) {
		$this->m_db_connection = $mysqli_connection;
		parent::__construct();
	}

	private function copy_client_details_data_to_client_details_info_do($client_details_info_result, $client_details_info_do) {
						$client_details_info_do->m_client_id= $client_details_info_result['client_id'];
						$client_details_info_do->m_name= $client_details_info_result['name'];
						$client_details_info_do->m_address= $client_details_info_result['address'];
						$client_details_info_do->m_phonenumber= $client_details_info_result['phonenumber'];
						$client_details_info_do->m_enrolled_by= $client_details_info_result['enrolled_by'];
						$client_details_info_do->m_status= $client_details_info_result['status'];
	}
	
	
	public function getClientDetails()
	{
	
	     $query = "SELECT $this->m_fields FROM client_details WHERE client_id = ?";
		
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
		 
		 
	    $client_details_info_result = $result_set->fetch_assoc();
		
		echo json_encode($client_details_info_result);
	
	
	}

	function load_by_client_details_id($client_details_id){
		
		$this->m_status = false;

		$query = "SELECT $this->m_fields FROM client_details WHERE client_id = ?";
		
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

		$client_details_info_do = new ClientDetailsDO;
		if($client_details_info_result = $result_set->fetch_assoc()) {

			$this->m_status_code = STATUS_SUCCESS;
			$this->copy_client_details_data_to_client_details_info_do($client_details_info_result, $client_details_info_do);
		}

		$query_stmt->close();
		return $client_details_info_do;
	}

	function load_by_client_details_phonenumber($client_details_phonenumber) 
	{
		$this->m_status = false;

		$query = "SELECT $this->m_fields FROM client_details WHERE phonenumber = ?";
		if( !($query_stmt = $this->m_db_connection->prepare($query))) {
			$this->m_status_code = STATUS_PREPARE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return;
		}
		if( !$query_stmt->bind_param("s", $client_details_phonenumber) ) {
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
	
	function load_by_client_phone_number($client_details_phone_number) 
	{
		$this->m_status = false;

		$query = "SELECT $this->m_fields FROM client_details WHERE phonenumber = ?";
		if( !($query_stmt = $this->m_db_connection->prepare($query))) {
			$this->m_status_code = STATUS_PREPARE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return;
		}
		if( !$query_stmt->bind_param("s", $client_details_phone_number) ) {
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

		$client_details_array = array();
		while($client_details_info_result = $result_set->fetch_assoc()) {
			$this->m_status_code = STATUS_SUCCESS;
			// $this->copy_client_details_data_to_client_details_info_do($client_details_info_result, $client_details_info_do);
			$client_details_array[] = $client_details_info_result;
		}
		$query_stmt->close();
		return $client_details_array;
	}

	function load_client_details_by_enrolled_name($client_enrolled_by){
		
		$this->m_status = false;

		$query = "SELECT $this->m_fields FROM client_details WHERE enrolled_by = ?";

		if( !($query_stmt = $this->m_db_connection->prepare($query))) {
			$this->m_status_code = STATUS_PREPARE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return;
		}
		if( !$query_stmt->bind_param("s", $client_enrolled_by) ) {
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

		$client_details_array = array();
		while($client_details_info_result = $result_set->fetch_assoc()) 
		{
			$client_details_info_do = new ClientDetailsDO;
			$this->m_status_code = STATUS_SUCCESS;
			$this->copy_client_details_data_to_client_details_info_do($client_details_info_result, $client_details_info_do);
			$client_details_array[] = $client_details_info_do;
		}
		
		$query_stmt->close();
		return $client_details_array;
	}
	
	function create_client_details($client_details_do){
		$this->m_status = false;

		$query = " INSERT INTO client_details ($this->m_fields) VALUES(?,?,?,?,?,?);";

		if( !($query_stmt = $this->m_db_connection->prepare($query))) {
			$this->m_status_code = STATUS_PREPARE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return $this->m_status;
		}		
		if( !$query_stmt->bind_param('isssss',$client_details_do->m_client_id, $client_details_do->m_name, $client_details_do->m_address, $client_details_do->m_phonenumber, $client_details_do->m_enrolled_by, $client_details_do->m_status) )
		{
			$this->m_status_code = STATUS_BIND_PARAM_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return $this->m_status;
		}
		if( !$query_stmt->execute() ) {
			$this->m_status_code = STATUS_EXECUTE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return $this->m_status;
		}
		$query_stmt->close();

		$this->m_status = true;
		$this->m_status_code = STATUS_SUCCESS;

		return $this->m_status;
	}	
	
	function update_client_details($client_details_do){
		$this->m_status = false;

		$query = " UPDATE client_details set status = ? where client_id = ?";

		if( !($query_stmt = $this->m_db_connection->prepare($query))) {
			$this->m_status_code = STATUS_PREPARE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return $this->m_status;
		}		
		if( !$query_stmt->bind_param('si',$client_details_do->m_status,$client_details_do->m_client_id) )
		{
			$this->m_status_code = STATUS_BIND_PARAM_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return $this->m_status;
		}
		if( !$query_stmt->execute() ) {
			$this->m_status_code = STATUS_EXECUTE_FAILED;
			$error_message = (isset($query_stmt->error)) ? " | Error Message : ". $query_stmt->error : "";
			return $this->m_status;
		}
		$query_stmt->close();

		$this->m_status = true;
		$this->m_status_code = STATUS_SUCCESS;

		return $this->m_status;
	}
}
?>
