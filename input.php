<?php

function processInput() {
	if(isset($_POST['submit'])) {
		$inputs = getInputs();
		$errors = getInputErrors($inputs);

		return ['inputs' => $inputs, 'errors' => $errors];
	}
}





function getInputs() {
	if(isset($_POST['submit'])) {
		return [
			'name'         => $_POST['name'],
			'project'      => $_POST['project'],
			'title'        => $_POST['title'],
			'due'          => $_POST['due'],
			'background'   => $_POST['background'],
			'deliverables' => $_POST['deliverables']
		];
	}
	else { return false; }
}





function getInputErrors($inputs) {
	$err = [];

	$err['name']         = getTextErrors('name', $inputs['name'], 50, true);
	$err['title']        = getTextErrors('title', $inputs['title'], 150, false);
	$err['background']   = getTextErrors('background', $inputs['background'], 1000, false);
	$err['deliverables'] = getTextErrors('deliverables', $inputs['deliverables'], 1000, false);

	if($inputs['due'] != '') {
		if(strtotime($inputs['due'])) {
			//Valid date
		}
		else { $err['due'] = 'Invalid date'; }
	}
	else { $err['due'] = 'Due date cannot be blank'; }

	foreach($err as $key=>$msg) {
		if(!$msg) { unset($err[$key]); }
	}

	if(count($err) > 0) {
		return $err;
	}
	else { return false; }
}





function getTextErrors($key, $text, $max, $alpha) {
	if($text != '') {
		if(strlen($text) < $max) {
			if($alpha) {
				if(ctype_alpha(str_replace(' ', '', $text))) {
					return false;
				}
				else { return ucfirst($key) . " can only contain letters and spaces"; }
			}
			else { return false; }
		}
		else { return ucfirst($key) . " must be less than $max characters"; }
	}
	else { return ucfirst($key) . " cannot be blank"; }
}





function getFormFeedback($error) {
	if($error) {
		$icon = "<span class='glyphicon glyphicon-remove form-control-feedback'></span>";					
		$text = "<p class='help-block'>$error</p>";
	}
	return $icon . $text;
}