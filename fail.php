<?php if(isset($_GET['error'])) { $error = $_GET['error']; } else { $error = false; } ?>

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
			<h2 class='text-danger'>Error</h2>
		</div></div>
		
		<div class='row'><div class='col-md-12 spacer-sm'></div></div>

		<?php if($error) { ?>
			<div class='row'><div class='col-md-12'>
				<h4><strong>Error:</strong> <?php echo $error; ?></h4>
			</div></div>
		<?php } ?>

		<div class='row'><div class='col-md-12'>
				<h4><strong>Uh oh!</strong> Something went wrong and your request was <strong>not</strong> submitted.<br>Please try again. If the error persists, contact the administrator.</h4>
		</div></div>

		<div class='row'><div class='col-md-12 spacer-sm'></div></div>

		<div class='row'>
			<div class='col-md-2 col-md-offset-4'><a href=''>Try Again</a></div>
			<div class='col-md-2'><a href=''>View All Requests</a></div>
		</div>
	</div>
</body>
</html>