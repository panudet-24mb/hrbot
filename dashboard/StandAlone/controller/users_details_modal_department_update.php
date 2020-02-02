<?php



date_default_timezone_set("Asia/Bangkok");
$date = date("Y-m-d");
$time = date("H:i:s");
include('../config/dbconnect.php');

$id = $_POST["users_id"];
$department = $_POST["department"];
$section = $_POST["section"];

// echo $id;
// echo $status;

// if(isset($_POST['btn1']))
// {
//   $data = $_POST['submit1'];
//   echo $data;
// }else if(isset($_POST['btn2']))
// {
//   $data = $_POST['submit2'];
//   echo $data;
// }else if(isset($_POST['btn3']))
// {
//   $data = "test = ".$_POST['submit3'];
//   echo $data;
// }




 $conn=mysqli_connect($serverName,$userName,$userPassword,$dbName)or die("connecterror");
 mysqli_set_charset($conn,"utf8");


 $sql = "UPDATE users SET 
 users_department = '$department',
 users_section = '$section'

 WHERE users_id = '$id' ";

	$query = mysqli_query($conn,$sql);

	if($query) {

     echo json_encode(array("statusCode" => 200));
	}else {
        echo json_encode(array("statusCode" => 201));
    }

	mysqli_close($conn);
?>