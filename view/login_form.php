<?php 

if(!isset($_SESSION)){
    session_start();
}

require_once 'controller/sw_login_controller.php';

if(isset($_SESSION["error_info"]))
{
	$error_info = $_SESSION["error_info"];
	$show_failure_message = $error_info["show_failure_message"];
	if (isset($error_info["failure_message"]))
	{
		$failure_message = $error_info["failure_message"];
	}
	unset($_SESSION["error_info"]);
}
else
{
	$sw_login_controller = new SWLoginController();
	$container = $sw_login_controller->sw_user_login();

	if(isset($admin_session_check_container->sw_user_loggedin) && 
				($admin_session_check_container->sw_user_loggedin == true))
	{
		header("Location: sw_dashboard.php?from_login_page=true");
	}
}
?>

<html> 
<head>
<?php include 'inc_head.php';?>
</head>
 <body style="padding-bottom:0;padding-top:0" class="indexBody">
	<?php
	if( isset($show_failure_message) ) { ?>
	<br/>
	   <?php if( isset($failure_message) ) { ?>
		   <div class="alert alert-danger homealert" role="alert" align="center">
			   <strong><?php echo $failure_message ?></strong>          
		   </div>
		   <?php } else { ?>
			<div class="alert alert-danger homealert" role="alert" align="center">
			   <strong><?php echo "We are unable to process your request. Sorry for the inconvenience." ?></strong>          
		   </div>
		<?php } ?>
	<br/>
	<?php } else { ?>
	<br/>
		<?php if( isset($info_message) ) { ?>
		   <div class="alert alert-success homealert" role="alert" align="center">
			   <strong><?php echo $info_message ?></strong>          
		   </div>
		<?php } else if (isset($warning_message)) { ?>
		   <div class="alert alert-danger homealert" role="alert" align="center" style="color:red;width:94%"><?php echo $warning_message ?>
			</div>
		<?php } ?>
	<br/>
	<?php } ?>
 
    <div class="container">
        <div class="row">
            <div class="col-md-offset-5 col-md-3">
                <div class="form-login" width="100%">
                <h4>Welcome my Social mate !!!</h4>
                <form name="user_login" id="user_login" action="sw_login_view.php" method="post">
                <input type="text" name="user_name" id="user_name" class="form-control input-sm chat-input" placeholder="username" />
                </br>
                <input type="password" name="password" id="password" class="form-control input-sm chat-input" placeholder="password" />
                </br>
                <div class="wrapper" width="300px">
                <p><input type="submit" class="homebuttonFull" title="Custom Order" id="loadCustomOrder1" value="Login"/></p>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
 <!-- End container -->
</body> 
</html>
