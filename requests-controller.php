<?php 

include 'db.php';

$db = dbConnect();

function buildTable($db) {
	$requests = getRequests($db, '');
	foreach($requests as $request) {
		echo '<tr>';
		echo '<td>' . $request['id']      . '</td>';
		echo '<td>' . $request['status']  . '</td>';
		echo '<td>' . $request['client']  . '</td>';
		echo '<td>' . $request['agent']   . '</td>';
		echo '<td>' . $request['project'] . '</td>';
		echo '<td>' . $request['title']   . '</td>';
		echo '<td>' . date('d M Y', $request['opened'])  . '</td>';
		echo '<td>' . date('d M Y', $request['requested_due_date']) . '</td>';
		echo '<td>' . date('d M Y', $request['closed'])  . '</td>';
		echo '</tr>';
	}
}