<?php 

include "../config/dbconnect.php";

$departid = $_POST['depart'];   // department id

$sql = "SELECT section_id,section_name FROM section WHERE section_department_id != '1' AND section_department_id=".$departid;

$result = mysqli_query($conn,$sql);

$users_arr = array();
$users_arr[] = array("section_id" => "99", "section_name" => "ส่งข้อความไปยังทุกฝ่าย"); //เงื่อนไข  = 99 คือส่งไปทุกแผนก

while( $row = mysqli_fetch_array($result) ){
    $userid = $row['section_id'];
    $name = $row['section_name'];

    $users_arr[] = array("section_id" => $userid, "section_name" => $name);
}

// encoding array to json format
echo json_encode($users_arr);


?>