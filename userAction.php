<?php
include("config.php");
$db = "betaville";
$server = "localhost";
$username = "root";
$password = "mierda14";
mysql_connect($server, $username, $password );
mysql_select_db($db);
$userActions = new UserActions($db);
?>