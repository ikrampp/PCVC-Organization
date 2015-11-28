<?php
define("STATUS_SUCCESS", "0");
define("STATUS_PREPARE_FAILED", "1");
define("STATUS_BIND_PARAM_FAILED", "2");
define("STATUS_EXECUTE_FAILED", "3");
define("STATUS_GET_RESULT_FAILED", "4");
define("STATUS_FETCH_FAILED", "5");
define("STATUS_FETCH_NO_DATA", "6");
define("STATUS_INVALID_INPUT_DATA", "7");

class BaseAccess {

	private $m_status;
	private $m_status_code;
	private $m_status_message;
	
	function __construct() {
		$m_status = true;
		$m_status_code = STATUS_SUCCESS;
		$m_status_message = "";
	}
	
	public function set_status( $value ) {
		$this->m_status = $value;
	}
	
	public function set_status_code( $value ) {
		$this->m_status_code = $value;
	}
	
	public function set_status_message( $value ) {
		$this->m_status_message = $value;
	}
	
	public function get_status() {
		return $this->m_status;
	}
	
	public function get_status_code() {
		return $this->m_status_code;
	}
	
	public function get_status_message() {
		return $this->m_status_message;
	}
}

?>

