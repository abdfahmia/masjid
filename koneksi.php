<?php

global $conn;

function open_db()
{
	//include 'config.php';

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "masjid";

	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

	return $conn;
}

function close_db($conn)
{
	$conn->close();
}