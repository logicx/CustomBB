<?php
//config file for databases and other things.
$dbname = "custombb";
$host = "localhost";

//database login settings
$user  = "root";
$pass = "";

//functons
mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());



?>