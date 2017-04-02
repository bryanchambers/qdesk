<?php include 'requests-controller.php' ?>

<html>
<head>
	<title>QDesk</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		.spacer-sm { height: 15px; }
		.spacer-md { height: 40px; }
		.spacer-lg { height: 100px; }
	</style>
	
	<!-- JS frameworks -->
	<script type='text/javascript' src='jquery/jquery.min.js'></script>
	<script type='text/javascript' src='bootstrap/js/bootstrap.min.js'></script>
</head>



<body>
	<div class='container text-center'>		
		<div class='row'><div class='col-md-12 spacer-sm'></div></div>
		
		<div class='row'><div class='col-md-12'>
			<h2>Validation &amp; Modeling Requests</h2>
		</div></div>

		<div class='row'><div class='col-md-12 spacer-md'></div></div>
		
		<div class='row'><div class='col-md-12'>
			<table class='table table-hover'>
				<tr>
					<th>ID</th>
					<th>Status</th>
					<th>Client</th>
					<th>Agent</th>
					<th>Project</th>
					<th>Title</th>
					<th>Opened</th>
					<th>Due</th>
					<th>Closed</th>
				</tr>
				<?php buildTable($db); ?>
			</table>
		</div></div>
	</div>
</body>
</html>