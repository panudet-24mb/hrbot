<?php 
session_start();

include('../config/dbconnect.php');

$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName)or die("connecterror");

$strSQL = "SELECT * FROM admin WHERE admin_usersname = '".mysqli_real_escape_string($objCon,$_POST['usersname'])."' 
and admin_password = '".mysqli_real_escape_string($objCon,$_POST['password'])."'";
$objQuery = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
if(!$objResult)
{
        echo "Username and Password Incorrect!";
}
else
{
        $_SESSION["admin_id"] = $objResult["admin_id"];
        $_SESSION["admin_usersname"] = $objResult["admin_usersname"];

        session_write_close();
        
        if($objResult["admin_status"] == "ADMIN")
        {
            header("location:../index.php");
            
        }
        else
        {
            header("location:../login.php");
        }
}
mysqli_close($objCon);
?>

