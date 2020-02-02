<?php



 date_default_timezone_set("Asia/Bangkok");
$date = date("Y-m-d");
$time = date("H:i:s");

$serverName = "localhost";
$userName = "root";
$userPassword = "P@ssw0rd";
$dbName = "hrbot";

$id = $_REQUEST['userid'];
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$department = $_REQUEST['department'];
$section = $_REQUEST['section'];
$citizenid = $_REQUEST['citizenid'];
$empid = $_REQUEST['empid'];



// echo $fullname;
// // echo $id;
// // echo $info;echo $pic;
// echo $statusMessage;





 $connect=mysqli_connect($serverName,$userName,$userPassword,$dbName)or die("connecterror");

 $sql_x = "select users_citizenid from users where users_citizenid='$citizenid' group by users_id";
 $result_x = mysqli_query($connect,$sql_x) or die ("error1");
 $row =  $result_x -> fetch_array(MYSQLI_ASSOC);

 if($citizenid != $row["users_citizenid"]){
    echo "ยังไม่ได้รับการสร้างรหัสของท่าน";
    exit();
 }


 mysqli_set_charset($connect,"utf8");
 $sql = "select users_uid from users where users_uid='$id' group by users_id";
 $result = mysqli_query($connect,$sql) or die ("error1");
 $count_row = mysqli_num_rows($result);
 if($count_row < 1){

    $Check = "SELECT users_citizenid from users WHERE users_citizenid = '$citizenid'";
    $checkresult = mysqli_query($connect,$Check) or die ("error2");
    $row = $checkresult->fetch_assoc();
    $users_citizenid = $row["users_citizenid"];
    echo '<hr>';
    echo $users_citizenid;



 $query = "UPDATE users SET users_uid = '$id' WHERE users_citizenid = '$users_citizenid'";
 $resource = mysqli_query($connect,$query) or die ("เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่");

 if($resource){
    echo '<h1 align="center"><font color="red">*** OK1 ***</font></h1>';
 }else{
    '<h1 align="center"><font color="red">*** หมายเลขบัตรประชาชนนี้ถูกใช้งานไปแล้ว ***</font></h1>';
 }



 }else{

    echo "<br/><br/>";
     echo '<h1 align="center"><font color="red">*** ขออภัยครับ ข้อมูลของท่านยังไม่ได้อัพเดทเข้าสู่ระบบ  หรือ ท่านเป็นสมาชิกอยู่แล้ว ***</font></h1>';


 }
