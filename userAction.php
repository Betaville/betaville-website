<?php
include("../Betaville-Web-Service/inc/class.user.inc.php");
$db = "betaville";
$server = "localhost";
$username = "root";
$password = "mierda14";
mysql_connect($server, $username, $password );
mysql_select_db($db);
$userActions = new UserActions($db);
?>