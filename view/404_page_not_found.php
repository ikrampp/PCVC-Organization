<?php
if(!isset($_SESSION)){
    session_start();
}
require_once 'controller/sw_login_controller.php';
require_once 'controller/client_report_controller.php';

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

$controller = new ClientReportController();
$container = $controller->load_client_details();

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
?>

<html>
<head>

<?php  include 'inc_head.php'; ?>

<link rel="stylesheet" href="css/sumoselect.css?v=3.0">
<script src="js/jquery.sumoselect.min.js?v=3.0"></script>
</head>

<body>
<div id="wrapper" style="background-color:#24778E">
	<?php include 'dashboard_navbar_view.php'; ?>
	<div id="page-wrapper">
	    <div class="row">
                <div class="col-lg-12">
					<img src="images/error_pages_404.jpg" height="500px" width="1200px"/>
                </div>
                <!-- /.col-lg-12 -->
        </div>
        </div>
</div>
</body>
</html>
