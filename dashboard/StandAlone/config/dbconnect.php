
<?php

	ini_set('display_errors', 1);
	error_reporting(~0);

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "P@ssw0rd";
   $dbName = "hrbot";
  
    $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
    mysqli_set_charset($conn,"utf8");

    
?>