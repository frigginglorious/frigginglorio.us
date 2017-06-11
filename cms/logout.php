<?php
$_SESSION['loggedin'] = FALSE;
session_destroy();
$serverName = $_SERVER['SERVER_NAME'];
header("Location: http://$serverName");

?>
