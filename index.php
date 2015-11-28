<?php
if(!isset($_SESSION)){
    session_start();
}
{
	header("Location: view/login_form.php");
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<style>
html, body {
    margin: 0;
    padding: 0;
	
}
</style>	
<?php  include 'we_view/inc_head.php'; ?>

<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet" href="<?php echo CDN_URL?>/css/bootstrap-table.min.css?v=1.0">
<link rel="stylesheet" href="<?php echo CDN_URL?>/css/bootstrap-editable.css">

<link rel="stylesheet" href="<?php echo CDN_URL?>/css/select2.css?v=1.0">
<link rel="stylesheet" href="<?php echo CDN_URL?>/css/select2-bootstrap.css?v=1.0">
<link rel="stylesheet" href="<?php echo CDN_URL?>/css/sb-admin-2.css?v=1.0">
<link rel="stylesheet" href="<?php echo CDN_URL?>/css/timeline.css?v=1.0">
<link rel="stylesheet" href="<?php echo CDN_URL?>/css/metisMenu.min.css?v=1.0">
<link rel="stylesheet" href="<?php echo CDN_URL?>/css/jquery.datetimepicker.css">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo CDN_URL?>/css/sumoselect.css?v=3.0">
<script src="<?php echo CDN_URL?>/js/jquery.sumoselect.min.js?v=3.0"></script>
<script>
</head>
<body>
Testing
</body>
</html>
