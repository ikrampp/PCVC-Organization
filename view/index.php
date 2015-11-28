<?php
if(!isset($_SESSION)){
    session_start();
}
{
	header("Location: login_form.php");
}
?>

<html>
<head>
<?php include 'inc_head.php';?>
</head>
<body>
Testing
</body>
</html>
