
<head>
    <link rel="stylesheet" href="./styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<div class="Navbar">
	<?php
		include("fetch_name.php");
	?>
    <ul>
        <li><a href="#Login/Logout">Login/Logout</a></li>
        <li>
			<a href="#" class="notification">
				<span>Notifications </span>
				<span class="badge">3</span>
			  </a>
		</li>
		<li><a href="#Register">Register</a></li>	  
        <li><a href="#Aboutus">About us</a></li>
    </ul>
</div>
<div id="content">
	<div id="content-header">
		<div class="clearfix">
			<div class="float-left">
				<div class="mini-nav">
                    <span class="user-img"><img src="link_to_user_IMAGE"></span><span class="user-name"><?php echo $student_name; ?></span><i class="fa fa-angle-down" aria-hidden="true"></i>
					<a><i class="fa fa-navicon" aria-hidden="true"></i></a>
				</div>	
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="banner blue">
			<div class="clearfix">
				<div class="float-left">
					<h4>Welcome, <?php echo $student_name; ?></h4>
					<h5>Let's take a look at your progress.</h5>
				</div>				
				<br>
				<br>
				
			</div>
			<div class="donut instalment1" style="float: right; margin-right: 5px">
				<div style="float: right; margin-right: 200px" style="display: inline;">Attendance Percentage:</div>
				<div class="donut-default"></div>
				<div class="donut-line"></div>
				<div class="donut-text">
				  <span>check</span>
				</div>
				<div class="donut-case"></div>

			</div>
		</div>
	
		<?php
			include("fetch_data.php");
		?>

</body>