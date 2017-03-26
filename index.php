<html>
<head>
	<title>Queued</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->

	<style type="text/css">
		html { overflow-y: scroll; }
		.spacer-sm { height: 15px; }
		.spacer-md { height: 40px; }
		.spacer-lg { height: 100px; }
		textarea { resize: vertical; }
	</style>
	
	<!-- JS frameworks -->
	<script type='text/javascript' src='jquery/jquery.min.js'></script>
	<script type='text/javascript' src='bootstrap/js/bootstrap.min.js'></script>
</head>

<body>
	<div class='container'>
		<div class='row'><div class='col-md-12 spacer-sm'></div></div>
		
		<div class='row'><div class='col-md-12 text-center'>
			<h2>Cell Validation Work Request</h2>
		</div></div>
		
		<div class='row'><div class='col-md-12 spacer-md'></div></div>
		
		<div class='row'><div class='col-md-6 col-md-offset-3'>
			<form>
				<div class='form-group'>
					<label>Requestor</label>
					<input type='text' class='form-control' placeholder='Your name'>
				</div>

				<div class='form-group'>
					<label>Project</label>
					<select class='form-control'>
						<option>26Ah NMC</option>
						<option>20Ah VDA</option>
						<option>General</option>
					</select>
				</div>

				<div class='form-group'>
					<label>Title</label>
					<input type='text' class='form-control' placeholder='Short description of request'>
				</div>

				<div class='form-group'>
					<label>When do you need it?</label>
					<input type='text' class='form-control' placeholder='Accepts most date formats. You can also type "2 weeks", "next Monday", etc.'>
				</div>

				<div class='form-group'>
					<label>Background</label>
					<textarea class='form-control' rows='5' placeholder='Describe the request background and deliverables using clear and consise language.'></textarea>
				</div>

				<div class='form-group'>
					<label>Deliverables</label>
					<textarea class='form-control' rows='5' placeholder='Describe the request background and deliverables using clear and consise language.'></textarea>
				</div>

				<button type='submit' class='btn btn-primary'>Submit</button>
			</form>
		</div></div>

		<div class='row'><div class='col-md-12 spacer-lg'></div></div>
	</div>
</body>
</html>