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
				status_id INT, 
				client VARCHAR(100),
				project_id INT,
				title VARCHAR(255),
				opened INT,
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


function createRequest() {}

function changeStatus() {}

function changeDueDate() {}

function deleteRequest() {}

function getRequests() {}

function searchRequests() {}

function getOneRequest() {}

function createProject() {}

function deleteProject() {}

function getProjects() {}

function createStatus() {}

function deleteStatus() {}

function getStatuses() {}








