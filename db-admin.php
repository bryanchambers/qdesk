<?php include 'db-admin-controller.php'; ?>

<html>
<head>
	<title>QDesk</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		.spacer-sm { height: 15px; }
		.spacer-md { height: 40px; }
		.spacer-lg { height: 100px; }
		span       { font-size: 1.5em; }
		input      { width: 110px; }
	</style>
	
	<!-- JS frameworks -->
	<script type='text/javascript' src='jquery/jquery.min.js'></script>
	<script type='text/javascript' src='bootstrap/js/bootstrap.min.js'></script>
</head>



<body>
	<div class='container text-center'>
		
		<div class='row'><div class='col-md-12 spacer-sm'></div></div>
		
		<div class='row'><div class='col-md-12 text-center'>
			<h2>Database Admin</h2>
		</div></div>
		
		<div class='row'><div class='col-md-12 spacer-md'></div></div>
		


		<form method='post'>
			
			<!-- Requests Table -->
			<div class='row'>
				<div class='col-md-1 col-md-offset-4'>
					<span class='form-control-feedback'>Requests</span>
				</div>
				
				<div class='col-md-1'>
					<span class='glyphicon <?php echo $tables['requests']['glyph']; ?> form-control-feedback'></span>
				</div>
				
				<div class='col-md-2'>
					<input name='submit' type='submit' class='btn btn-default btn-sm' value='Create Requests' <?php echo $tables['requests']['disabled'] ?>>
				</div>
			</div>
			


			<div class='row'><div class='col-md-12 spacer-md'></div></div>



			<!-- Projects Table -->
			<div class='row'>
				<div class='col-md-1 col-md-offset-4'>
					<span class='form-control-feedback'>Projects</span>
				</div>
				
				<div class='col-md-1'>
					<span class='glyphicon <?php echo $tables['projects']['glyph'] ?> form-control-feedback'></span>
				</div>
				
				<div class='col-md-2'>
					<input name='submit' type='submit' class='btn btn-default btn-sm' value='Create Projects' <?php echo $tables['projects']['disabled']; ?>>
				</div>
			</div>



			<div class='row'><div class='col-md-12 spacer-md'></div></div>
			


			<!-- Statuses Table -->
			<div class='row'>
				<div class='col-md-1 col-md-offset-4'>
					<span class='form-control-feedback'>Statuses</span>
				</div>
				
				<div class='col-md-1'>
					<span class='glyphicon <?php echo $tables['statuses']['glyph']; ?> form-control-feedback'></span>
				</div>
				
				<div class='col-md-2'>
					<input name='submit' type='submit' class='btn btn-default btn-sm' value='Create Statuses' <?php echo $tables['statuses']['disabled']; ?>>
				</div>
			</div>
		</form>

		<div class='row'><div class='col-md-12 spacer-lg'></div></div>
	</div>
</body>
</html>