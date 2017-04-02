<?php 

include 'input.php';
include 'db.php';

$db = dbConnect();

$input_data = processInput();
$inputs     = $input_data['inputs'];
$errors     = $input_data['errors'];

if(isset($_POST['submit'])) {
	if(!$errors) {
		$request = createRequest($db, $inputs);
		if($request['error']) {
			header('Location: fail.php?error=' . $request['error']);
		}
		else {
			header('Location: success.php?id=' . $request['id']);
		}
	}
}

