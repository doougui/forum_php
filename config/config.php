<?php 
	require('environment.php');

	// Files, folders, etc
	$innerFolder = "forum/";
	define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$innerFolder}");

	if (substr($_SERVER['DOCUMENT_ROOT'], -1) == '/') {
		define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$innerFolder}");
	} else {
		define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$innerFolder}");
	}

	// Global folders
	define('DIRIMG', DIRPAGE."public/img/");
	define('DIRCSS', DIRPAGE."public/css/");
	define('DIRJS', DIRPAGE."public/js/");
	define('DIRVID', DIRPAGE."public/video/");
	define('DIRAUD', DIRPAGE."public/audio/");
	define('DIRFONT', DIRPAGE."public/fontes/");
	define('DIRDESIGN', DIRPAGE."public/design/");

	// Database connection
	$config = [];

	if (ENVIRONMENT == 'development') {
		global $config;
		$config['dbname'] = 'forum';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'root';
		$config['dbpass'] = '';
	} else {
		$config['dbname'] = 'forum';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'root';
		$config['dbpass'] = '';
	}