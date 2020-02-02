<?php



date_default_timezone_set("Asia/Bangkok");
$date = date("Y-m-d");
$time = date("H:i:s");
include('../config/dbconnect.php');

$section_name = $_POST["section_name"];
$department_id = $_POST["department_id"];





// echo "old = ".$old_bd; 
// echo "new".$bd;

// echo $fullname;
// // echo $id;
// // echo $info;echo $pic;
// echo $statusMessage;

 $conn=mysqli_connect($serverName,$userName,$userPassword,$dbName)or die("connecterror");
 mysqli_set_charset($conn,"utf8");


 $sql = "INSERT INTO section (section_name,section_department_id,section_details_id)
 VALUES ('$section_name','$department_id','1') ";

	$query = mysqli_query($conn,$sql);

	if($query) {
        echo json_encode(array("statusCode" => 200));
	}else {
        echo json_encode(array("statusCode" => 201));
    }

	mysqli_close($conn);
