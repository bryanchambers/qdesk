<?php if(isset($_GET['id'])) { $id = $_GET['id']; } else { $id = false; } ?>

<html>
<head>
	<title>QDesk</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		.spacer-sm { height: 15px; }
		.spacer-md { height: 40px; }
		.spacer-lg { height: 100px; }
		h4 { line-height: 1.5em; }
	</style>
	
	<!-- JS frameworks -->
	<script type='text/javascript' src='jquery/jquery.min.js'></script>
	<script type='text/javascript' src='bootstrap/js/bootstrap.min.js'></script>
</head>



<body>
	<div class='container text-center'>		
		<div class='row'><div class='col-md-12 spacer-sm'></div></div>
		
		<div class='row'><div class='col-md-12'>
			<h2 class='text-success'>Request Submitted</h2>
		</div></div>
		
		<div class='row'><div class='col-md-12 spacer-sm'></div></div>

		<?php if($id) { ?>
			<div class='row'><div class='col-md-12'>
				<h4>Request ID: <strong><?php echo $id; ?></strong></h4>
			</div></div>
		<?php } ?>

		<div class='row'><div class='col-md-12'>
			<h4><strong> Yay!</strong> Your request has been submitted and is under review.<br>We will contact you shortly with more details.</h4>
		</div></div>

		<div class='row'><div class='col-md-12 spacer-sm'></div></div>

		<div class='row'><div class='col-md-12'>
			<a href=''>View All Requests</a>
		</div></div>
	</div>
</body>
</html>