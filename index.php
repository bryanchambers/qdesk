<?php include 'input-controller.php'; ?>

<html>
<head>
	<title>QDesk</title>

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
			<form method='post'>
				<div class="form-group has-feedback <?php if($errors['name']) { echo 'has-error'; } ?>">
					<label>Requestor</label>
					<input name='name' type='text' class='form-control' value='<?php echo $inputs['name']; ?>' placeholder='Your name'>
					<?php echo getFormFeedback($errors['name']); ?>
				</div>

				<div class='form-group'>
					<label>Project</label>
					<select name='project' class='form-control'>
						<option>26Ah NMC</option>
						<option>20Ah VDA</option>
						<option>General</option>
					</select>
				</div>

				<div class="form-group has-feedback <?php if($errors['title']) { echo 'has-error'; } ?>">
					<label>Title</label>
					<input name='title' type='text' class='form-control' value='<?php echo $inputs['title']; ?>' placeholder='Short description of request' >
					<?php echo getFormFeedback($errors['title']); ?>
				</div>

				<div class="form-group has-feedback <?php if($errors['due']) { echo 'has-error'; } ?>">
					<label>When do you need it?</label>
					<input name='due' type='text' class='form-control' value='<?php echo $inputs['due']; ?>' placeholder='Accepts most date formats. You can also type "2 weeks", "next Monday", etc.'>
					<?php echo getFormFeedback($errors['due']); ?>
				</div>

				<div class="form-group has-feedback <?php if($errors['background']) { echo 'has-error'; } ?>">
					<label>Background</label>
					<textarea name='background' class='form-control' rows='5' placeholder='Include any supporting information that will be necessary or helpful to complete this request.'><?php echo $inputs['background']; ?></textarea>
					<?php echo getFormFeedback($errors['background']); ?>
				</div>

				<div class="form-group has-feedback <?php if($errors['deliverables']) { echo 'has-error'; } ?>">
					<label>Deliverables</label>
					<textarea name='deliverables' class='form-control' rows='5' placeholder='What are we providing? Be specific and clear.'><?php echo $inputs['deliverables']; ?></textarea>
					<?php echo getFormFeedback($errors['deliverables']); ?>
				</div>

				<input name='submit' type='submit' class='btn btn-primary' value='Submit'>
			</form>
		</div></div>

		<div class='row'><div class='col-md-12 spacer-lg'></div></div>
	</div>
</body>
</html>