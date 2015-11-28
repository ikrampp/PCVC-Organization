<?php 

if(!isset($_SESSION)){
    session_start();
}
?>

<html> 
<head>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-select.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.min.css?v=1.0">
<link href="css/webuyu-styles.css?v=36.0" rel="stylesheet">

<script src="js/jquery-1.10.2.min.js?v=1.0"/></script>
<script src="js/jquery-ui.min.js?v=1.0"></script>
<script src="js/bootstrap.min.js?v=2.0"></script>
<script src="js/bootstrap-select.js?v=1.0"></script>

<style>
body {
  background-color:#043519;
  -webkit-font-smoothing: antialiased;
  font: normal 14px Roboto,arial,sans-serif;
}

.container {
    padding: 50px;
    padding-top: 200px;
    position: middle;
    width: 100%;
}

.form-login {
    background-color: #EDEDED;
    padding-top: 10px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 15px;
    border-color:#d2d2d2;
    border-width: 5px;
    box-shadow:0 1px 0 #cfcfcf;
}

h4 { 
 border:0 solid #fff; 
 border-bottom-width:1px;
 padding-bottom:10px;
 text-align: center;
}

.form-control {
    border-radius: 10px;
}

.wrapper {
    text-align: center;
}
</style>
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
                <form name="user_login" id="user_login" action="admin_login_view.php" method="post">
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
