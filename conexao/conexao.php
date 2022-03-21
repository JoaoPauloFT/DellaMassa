<?php
	global $config;
	$config = array();

	if($_SERVER['HTTP_HOST'] == 'localhost') {
		$config['dbname'] = 'id16726370_dellamassa';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'root';
		$config['dbpass'] = '';
	} else {
		$config['dbname'] = 'id16726370_dellamassa';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'id16726370_user';
		$config['dbpass'] = '135MassaDella!';
	}

	$conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
?>