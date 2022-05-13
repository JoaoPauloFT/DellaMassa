<?php
	global $config;
	$config = array();

	if($_SERVER['HTTP_HOST'] == 'localhost') {
		$config['dbname'] = 'pizzariadellam';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'root';
		$config['dbpass'] = '';
	} else {
		$config['dbname'] = 'pizzariadellam';
		$config['host'] = 'mysql.dellamassa.com.br';
		$config['dbuser'] = 'pizzariadellam';
		$config['dbpass'] = 'Dellamassa22';
	}

	$conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
	
	if (mysqli_connect_error()) {
		printf('Erro de conexão: %s', mysqli_connect_error());
		exit;
	}
	
	if (!mysqli_set_charset($conn, 'utf8')) {
		printf('Error ao usar utf8: %s', mysqli_error($link));
		exit;
	}
?>