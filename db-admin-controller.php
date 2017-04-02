<?php 

include 'db.php';

$db = dbConnect();

$names  = ['requests', 'projects', 'statuses'];
$tables = checkTables($db, $names);

foreach($tables as $index => $table) {
	if($table) {
		$glyph    = 'glyphicon-ok text-success';
		$disabled = 'disabled';
	}
	else {
		$glyph    = 'glyphicon-remove text-danger';
		$disabled = '';
	}
	$tables[$index] = ['glyph' => $glyph, 'disabled' => $disabled]; 
}

if(isset($_POST['submit'])) {
	$table = strtolower(explode(' ', $_POST['submit'])[1]);
	createTable($db, $table);
	header('Refresh: 0');
}