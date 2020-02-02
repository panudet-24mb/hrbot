<?php



date_default_timezone_set("Asia/Bangkok");
$date = date("Y-m-d");
$time = date("H:i:s");
include('../config/dbconnect.php');

$id = $_POST["users_id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$emp_id = $_POST["emp_id"];
$old_bd = $_POST["bd"];
$mobile = $_POST["mobile"];
$address = $_POST["address"];
$gender = $_POST["gender"]; 
$old_startjob =$_POST["startjob"];
$old_pro = $_POST["pro"];
$old_promotedate = $_POST["promotedate"];

$bd = date("Y-m-d", strtotime($old_bd));
$startjob = date("Y-m-d", strtotime($old_startjob));
$pro = date("Y-m-d", strtotime($old_pro));
$promotedate = date("Y-m-d", strtotime($old_promotedate));

$numrand = (mt_rand());

$upload=$_FILES['fileupload'];




if($upload <> '') {   

	if ($_FILES['fileupload']['size'] > 0 )
	{
$path="../public/fileupload/";  


 $type = strrchr($_FILES['fileupload']['name'],".");
	

$picname = $id."-".$date.$numrand.$type;
$path_copy=$path.$picname;
$path_link="fileupload/".$picname;


move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  	

$update_avatar = "UPDATE avatar SET 
avatar_img = '$picname'
WHERE avatar_users_id = '$id' ";

$query_2 = mysqli_query($conn,$update_avatar);



	}
   
}


 $conn=mysqli_connect($serverName,$userName,$userPassword,$dbName)or die("connecterror");
 mysqli_set_charset($conn,"utf8");


 $check = "SELECT avatar_users_id FROM avatar where avatar_users_id ='$id' ";
 $check_query = mysqli_query($conn,$check);
 $rowcount=mysqli_num_rows($check_query);
 if($rowcount < 1 ){

	$insertsql = "INSERT INTO avatar (avatar_users_id,avatar_img) 
		VALUES('$id','$picname')";
		
		$result_insert = mysqli_query($conn, $insertsql) ;
 }




 $sql = "UPDATE users SET 
 users_fname = '$fname' ,
 users_lname = '$lname',
 users_emp_id = '$emp_id',
 users_birthday = '$bd',
 users_mobile = '$mobile',
 users_address = '$address',
 users_gender = '$gender',
 users_startjob = '$startjob',
 users_probationary = '$pro',
 users_promote_date = '$promotedate'
 WHERE users_id = '$id' ";

	$query = mysqli_query($conn,$sql);



	if($query ) {
   
     echo json_encode(array("statusCode" => 200));

	}else {
        echo json_encode(array("statusCode" => 201));
    }

	mysqli_close($conn);
