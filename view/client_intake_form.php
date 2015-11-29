<?php
if(!isset($_SESSION)){
    session_start();
}
require_once 'controller/sw_login_controller.php';
require_once 'controller/client_intake_controller.php';

// Some redirect has happened and the flow reached here
// Get the error message to display in this page
if (isset($_SESSION["error_info"]))
{
	$error_info = $_SESSION["error_info"];
	
	if(isset($error_info["show_failure_message"]))
	{
		$show_failure_message = $error_info["show_failure_message"];
	}
	
	if(isset($error_info["failure_message"]))
	{
		$failure_message = $error_info["failure_message"];
	}
	
	unset($_SESSION["error_info"]);
}

if(!(isset($_COOKIE) && isset($_COOKIE['admin_name'])))
{
	$sw_login_controller = new SWLoginController();
	$container = $sw_login_controller->sw_user_login();

	if(isset($_SESSION["error_info"]))
	{
			header("Location: login_form.php");
	}
}

if (isset($_SESSION["error_info"]))
{
	$error_info = $_SESSION["error_info"];
	
	if(isset($error_info["show_failure_message"]))
	{
		$show_failure_message = $error_info["show_failure_message"];
	}
	
	if(isset($error_info["failure_message"]))
	{
		$failure_message = $error_info["failure_message"];
	}
	
	unset($_SESSION["error_info"]);
}

$controller = new ClientIntakeController();
$container = $controller->get_next_client_id();
?>

<html>
<head>

<?php  include 'inc_head.php'; ?>

<link rel="stylesheet" href="css/sumoselect.css?v=3.0">
<link rel="stylesheet" href="view.css?v=3.0">
<script src="view.js"></script>
<script src="js/jquery.sumoselect.min.js?v=3.0"></script>
<script>

$(document).ready(function() {

	$("#client_date_of_admission").datepicker({
		allowBlank: true,
		dateFormat: 'dd/mm/yy'
	});

	$("#client_dob").datepicker({
		allowBlank: true,
		dateFormat: 'dd/mm/yy'
	});	
	
	$("#client_date_of_incident").datepicker({
		allowBlank: true,
		dateFormat: 'dd/mm/yy'
	});		
	
});

</script>
</head>

<body>
<div id="wrapper" style="background-color:#24778E">
	<?php include 'dashboard_navbar_view.php'; ?>
	<div id="page-wrapper">
	    <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style="color:#2B87A2">Client Intake</h3>
                </div>
                <!-- /.col-lg-12 -->
        </div>
		<div id="errors_div">	
		</div>		
		<?php if( isset($show_failure_message) && isset($failure_message) ) { ?>
			<div class="alert alert-info homealert" role="alert" align="center">
			   <strong><?php echo $failure_message ?></strong>
			</div>
		<?php } ?>
       		
		<div class="row">
			<div class="col-lg-12">
				<?php include 'client_intake_form_view.php'; ?>
			</div>
		</div>
	</div>
</div>

<script src="js/bootstrap-table.js?v=2.0"></script>
<script src="js/locale/bootstrap-table-en-US.js?v=1.0"></script>
<script src="js/bootstrap-table-editable.js?v=1.0"></script>
<script src="js/bootstrap-editable.js"></script>

<script src="js/select2.min.js?v=1.0"></script>
<script src="js/sb-admin-2.js?v=1.0"></script>
<script src="js/metisMenu.min.js?v=1.0"></script>
<script src="js/jquery.datetimepicker.js"></script>
</body>
</html>
