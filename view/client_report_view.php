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
$container = $controller->load_all_client_form_details_for_report();

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

<link rel="stylesheet" href="css/bootstrap-table.min.css">
<link rel="stylesheet" href="css/bootstrap-editable.css">

</head>

<body>
<div id="wrapper" style="background-color:#24778E">
	<?php include 'dashboard_navbar_view.php'; ?>
	<div id="page-wrapper">
	    <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style="color:#2B87A2">All Client Details</h3>
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
			<?php if (isset($container) && isset($container->client_form_details_array))
				{?>
				        <div id="toolbar"></div>
				<table id="client_details_form_table" data-show-export="true" data-sortable="true">
				</table>
			<?php	}?>
			</div>
		</div>
	</div>
</div>

<script src="js/bootstrap-table.js?v=2.0"></script>
<script src="js/locale/bootstrap-table-en-US.js?v=1.0"></script>
<script src="js/bootstrap-table-editable.js?v=1.0"></script>
<script src="js/bootstrap-editable.js"></script>
<script src="js/bootstrap-table-export.js"></script>
<script src="js/tableExport.js"></script>
<?php if (isset($container) && isset($container->client_form_details_array))
{?>
<script>
    var data = <?php echo json_encode($container->client_form_details_array, JSON_PRETTY_PRINT); ?>;

    $(function () {
        $('#client_details_form_table').bootstrapTable({
            data: data,
			pagination: true,
			pageSize: 20,
			search: true,
			sortable: true,
			toolbar: '#toolbar',
			showColumns: true,
			paginationVAlign: 'top',
            columns: [
			{
                field: 'client_id',
                title: 'Client Id',
				sortable: true
            }, 
			{
                field: 'name',
                title: 'Client Name',
				sortable: true
            },
			{
                field: 'address',
                title: 'Client Address',
				sortable: true
            },
			{
                field: 'phonenumber',
                title: 'Phone Number',
				sortable: true
            },			
			{
                field: 'status',
                title: 'Status',
				sortable: true
            }, 
			{
                field: 'timestamp',
                title: 'Date',
				sortable: true
            },
			{
                field: 'form_json_data',
                title: 'Additional Data',
				visible: false
            }
			]
        });
    });
</script>
<?php } ?>
</body>
</html>
