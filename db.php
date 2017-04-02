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





function createTable($db, $name) {
	$query['requests'] = "CREATE TABLE IF NOT EXISTS requests(
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

	$query['projects'] = "CREATE TABLE IF NOT EXISTS projects(
							id INT PRIMARY KEY AUTO_INCREMENT,
							name VARCHAR(100) NOT NULL,
							code VARCHAR(100))";

	$query['statuses'] = "CREATE TABLE IF NOT EXISTS statuses(
							id INT PRIMARY KEY AUTO_INCREMENT,
							name VARCHAR(100) NOT NULL,
							css_class VARCHAR(100))";
	
	$result = $db->query($query[$name]);
}





function createRequest($db, $inputs) {
	$query = "INSERT INTO requests(
				status_id, 
				client, 
				project_id, 
				title, 
				opened, 
				requested_due_date, 
				background, 
				deliverables)
			  VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

	$status_id     = getID($db, 'statuses', 'Under Review');
	$client        = $inputs['name'];
	$proj_id       = getID($db, 'projects', $inputs['project']);
	$title         = $inputs['title'];
	$open          = time();
	$due           = strtotime($inputs['due']);
	$background    = $inputs['background'];
	$deliverables  = $inputs['deliverables'];

	$stmt = $db->prepare($query);
	$stmt->bind_param('isisiiss', $status_id, $client, $proj_id, $title, $open, $due, $background, $deliverables);

	$stmt->execute();
	return ['error' => $db->error, 'id' => $db->insert_id];
}





function getID($db, $table, $name) {
	$query  = "SELECT id FROM $table WHERE name = '$name' LIMIT 1";
	$result = $db->query($query);
	$row    = $result->fetch_assoc();

	if($row) { return $row[id]; }
	else {
		$query  = "INSERT INTO $table(name) VALUES('$name')";
		$result = $db->query($query);
		
		if($db->error) { return 1; }
		else {
			return $db->insert_id;
		}
	}
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





function getRequests($db, $filters) {
	$query = "SELECT requests.id 					AS 'id',
					 requests.status_id 			AS 'status_id',
					 statuses.name 					AS 'status',
					 statuses.css_class 			AS 'status_class', 
					 requests.client 				AS 'client',
					 requests.agent                 AS 'agent',
					 requests.project_id 			AS 'project_id',
					 projects.name 					AS 'project',
					 projects.code 					AS 'project_code', 
					 requests.title 				AS 'title',
					 requests.opened 				AS 'opened',
					 requests.requested_due_date 	AS 'requested_due_date', 
					 requests.final_due_date 		AS 'final_due_date',
					 requests.closed 				AS 'closed'
				FROM requests
				JOIN statuses ON requests.status_id = statuses.id
				JOIN projects ON requests.project_id = projects.id
				$filters";
	$result = $db->query($query);

	$output = [];
	while($row = $result->fetch_assoc()) {
		$output[] = $row;
	}
	return $output;
}





function getOneRequest($db, $id) {
	$query = "SELECT * FROM requests WHERE id = $id LIMIT 1";
	$result = $db->query($query);
}





function createProject($db, $name, $code) {
	$query = "INSERT INTO projects(name, code) VALUES(?, ?)";

	$stmt = $db->prepare($query);
	$stmt->bind_param('ss', $name, $code);

	$stmt->execute();
}





function deleteProject($db, $id) {
	$query = "DELETE FROM projects WHERE id = $id LIMIT 1";
	$result = $db->query($query);
}





function getProjects($db) {
	$query = "SELECT * FROM projects";
	$result = $db->query($query);
}





function createStatus($db, $name, $class) {
	$query = "INSERT INTO statuses(name, css_class) VALUES(?, ?)";

	$stmt = $db->prepare($query);
	$stmt->bind_param('ss', $name, $class);

	$stmt->execute();
}





function deleteStatus($db, $id) {
	$query  = "DELETE FROM statuses WHERE id = $id LIMIT 1";
	$result = $db->query($query);
}





function getStatuses($db) {
	$query  = "SELECT * FROM statuses";
	$result = $db->query($query);
}





function checkTables($db, $tables) {
	foreach($tables as $table) {
		$query  = "SHOW TABLES LIKE '$table'";
		$result = $db->query($query);
		$row    = $result->fetch_assoc();
		
		if($row) {
			$output[$table] = true;
		}
		else {
			$output[$table] = false;
		}
	}
	return $output;
}