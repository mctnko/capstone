<?php
 $username="root";
 $password="root";
 $hostname="localhost";
 $database="gclh";

 $dbhandle= mysql_connect($hostname, $username, $password);
 mysql_select_db($database, $dbhandle);
 
 
?>