<?php
	session_start();
	if($_SESSION["admin_id"] == "")
	{
        header("location:login.php");
     
		exit();
    }
    
	include('../config/dbconnect.php');

	$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$strSQL = "SELECT * FROM admin WHERE admin_id = '".$_SESSION['admin_id']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>