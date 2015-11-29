<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:#24778E;">
	<div class="navbar-header" style="background-color:#000;width:250px">
		<a class="navbar-brand" href="admin_home.php" style="color:#fff">PCVC - Admin</a>
	</div>
	<!-- /.navbar-header -->
	<?php $admin_name = ((isset($_COOKIE) && (isset($_COOKIE['admin_name']))) ? $_COOKIE['admin_name'] : "Admin") ; ?>
	<ul class="nav navbar-top-links navbar-right">
		<li style="color:#337ab7"><input type="button" id="toggle_menu" style="color:#337ab7" value="Toggle Menu"/></li>
		<li style="color:#337ab7"><span style="color:#fff">Welcome <?php echo $admin_name?></span></li>
		<li style="color:#337ab7"><a href="logout_view.php" style="color:#fff"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
		<!-- /.dropdown -->
	</ul>
	<!-- /.navbar-top-links -->

	<div id="sidebar_content" class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse" style="background-color:#D3E4E8;">
			<ul class="nav" id="side-menu">
				<li style="color:#337ab7">
					<a href="client_intake_form.php" style="color:#2F525B;font-weight:bold;font-size:14px;"><i class="fa fa-search" style="font-size:14px;color:#000;padding:0 10px"></i>Client Profile</a>
				</li>
				<li style="color:#337ab7;">
					<a href="client_follow_up_form.php" style="color:#2F525B;font-weight:bold;font-size:14px"><i class="fa fa-th" style="font-size:14px;color:#000;padding:0 10px"></i>Hospital FollowUp</a>
				</li>
                <li style="color:#337ab7;">
					<a href="dealer_management.php" style="color:#2F525B;font-weight:bold;font-size:14px"><i class="fa fa-th" style="font-size:14px;color:#000;padding:0 10px"></i>Form3</a>
				</li>
			</ul>
		</div>
		<!-- /.sidebar-collapse -->
	</div>
	<!-- /.navbar-static-side -->
</nav>