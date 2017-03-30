<?php

function dbConnect() {
	$db = json_decode(file_get_contents('db.json', FILE_USE_INCLUDE_PATH));
	$db_conn = new mysqli($db->host, $db->user, $db->password, $db->database);

	if($db_conn->connect_errno) {
		echo "<span style='font-family: monospace; font-size: 16px'>";
		echo "<span>Uh oh! Unable to connect to database.</span><br>";
		echo "<span style='color: gray'>$db->connect_error</span></span>";
		die();
	}	
	else { return $db_conn; }
}



function createTableRequests($db) {
	$query = "CREATE TABLE requests(
				id INT PRIMARY KEY AUTO_INCREMENT,
				status_id INT NOT NULL, 
				client VARCHAR(100) NOT NULL,
				agent VARCHAR(100),
				project_id INT,
				title VARCHAR(255) NOT NULL,
				opened INT NOT NULL,
				requested_due_date INT,
				final_due_date INT,
				closed INT,
				background TEXT,
				deliverables TEXT)";
	$result = $db->query($query);
}



function createTableStatuses($db) {
	$query = "CREATE TABLE statuses(
				id INT PRIMARY KEY AUTO_INCREMENT,
				name VARCHAR(100),
				css_class VARCHAR(100))";
	$result = $db->query($query);
}



function createTableProjects($db) {
	$query = "CREATE TABLE projects(
				id INT PRIMARY KEY AUTO_INCREMENT,
				name VARCHAR(100),
				code VARCHAR(100))";
	$result = $db->query($query);
}




function createRequest($db, $client, $project_id, $title, $requested_due_date, $background, $deliverables) {
	$query = "INSERT INTO requests(status_id, client, project_id, title, opened, requested_due_date, background, deliverables)
			  VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

	$stmt = $db->prepare($query);
	$stmt->bind_param('isisiiss', $status_id, $client, $project_id, $title, $opened, $requested_due_date, $background, $deliverables);

	$status_id = 1;
	$opened = time();

	$stmt->execute();
}



function changeStatus($db, $id, $status_id) {
	$query = "UPDATE requests SET status_id = $status_id WHERE id = $id LIMIT 1";
	$result = $db->query($query);
}


function changeDueDate($db, $id, $date) {
	$query = "UPDATE requests SET final_due_date = $date WHERE id = $id LIMIT 1";
	$result = $db->query($query);
}



function deleteRequest($db, $id) {
	$query = "DELETE FROM requests WHERE id = $id LIMIT 1";
	$result = $db->query($query);
}



function getRequests() {
	$query = "SELECT requests.id, requests.status_id, statuses.name, statuses.css_class, 
					 requests.client, requests.project_id, projects.name, project.code, 
					 requests.title, requests.opened, requests.requested_due_date, 
					 requests.final_due_date, requests.closed
				FROM requests
				JOIN statuses ON requests.status_id = statuses.id
				JOIN projects ON requests.project_id = projects.id";
	$result = $db->query($query);
}



function searchRequests() {}



function getOneRequest() {}



function createProject() {}



function deleteProject() {}



function getProjects() {}



function createStatus() {}



function deleteStatus() {}



function getStatuses() {}








