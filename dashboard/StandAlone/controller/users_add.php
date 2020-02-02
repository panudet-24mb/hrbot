<?php



date_default_timezone_set("Asia/Bangkok");
$date = date("Y-m-d");
$time = date("H:i:s");
include('../config/dbconnect.php');

$citizen_id = $_POST["citizen_id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$emp_id = $_POST["emp_id"];
$old_bd = $_POST["bd"];
$mobile = $_POST["mobile"];
$address = $_POST["address"];
$gender = $_POST["gender"];
$old_startjob = $_POST["startjob"];
$department = $_POST["department"];
$section = $_POST["section"];

$bd = date("Y-m-d", strtotime($old_bd));
$startjob = date("Y-m-d", strtotime($old_startjob));


//ฟังก์ชั่นสุ่มตัวเลข
$numrand = (mt_rand());
//เพิ่มไฟล์
$upload = $_FILES['fileupload'];
if ($upload <> '') {   //not select file
        //โฟลเดอร์ที่จะ upload file เข้าไป 
        $path = "../public/fileupload/";

        //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
        $type = strrchr($_FILES['fileupload']['name'], ".");

        //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
        $picname =  $date . $numrand . $type;
        $path_copy = $path . $picname;
        $path_link = "fileupload/" . $picname;

        //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
        move_uploaded_file($_FILES['fileupload']['tmp_name'], $path_copy);
}


if ($citizen_id == "" || $department == "" || $section == "") {
        echo json_encode(array("statusCode" => 202));
        exit();
}


// echo "old = ".$old_bd; 
// echo "new".$bd;

// echo $fullname;
// // echo $id;
// // echo $info;echo $pic;
// echo $statusMessage;

$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName) or die("connecterror");
mysqli_set_charset($conn, "utf8");




$sql = "INSERT INTO users (users_emp_id ,users_citizenid,users_fname,users_lname,users_department,users_section,users_mobile,users_address
                            ,users_birthday,users_gender,users_startjob,users_active,users_created)
                            VALUE('$emp_id','$citizen_id','$fname','$lname','$department','$section','$mobile',
                            '$address','$bd','$gender',
                            '$startjob','0',NOW())";

$query = mysqli_query($conn, $sql);

$get_users_id = $conn->insert_id;


$insertsql = "INSERT INTO avatar (avatar_users_id,avatar_img) 
 VALUES('$get_users_id','$picname')";
$result_insert = mysqli_query($conn, $insertsql);


if ($query) {
        echo json_encode(array("statusCode" => 200));
} else {
        echo json_encode(array("statusCode" => 201));
}

mysqli_close($conn);
