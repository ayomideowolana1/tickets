<?php
$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DATABASE = "tickets";

$conn =  new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if ($conn -> connect_error) {
	die( "Connection to Database Failed");
	# code...
}
