<?php





date_default_timezone_set("Asia/Bangkok");
$date = date("Y-m-d");
$time = date("H:i:s");

$serverName = "localhost";
$userName = "root";
$userPassword = "P@ssw0rd";
$dbName = "hrbot";

$id = $_REQUEST['userid'];
$status = $_REQUEST['status'];
$type = $_REQUEST['type'];
$category = $_REQUEST['category'];
$lat = $_REQUEST['lat'];
$long = $_REQUEST['long'];
$ip = $_REQUEST['ip'];
$mobile = $_REQUEST['mobile'];
$phone = $_REQUEST['phone'];
$tablet = $_REQUEST['table'];
$userAgent = $_REQUEST['userAgent'];
$os = $_REQUEST['os'];
$iPhone = $_REQUEST['iPhone'];
$bot = $_REQUEST['bot'];
$Webkit = $_REQUEST['Webkit'];
$Build = $_REQUEST['Build'];




// echo $fullname;
// // echo $id;
// // echo $info;echo $pic;
// echo $statusMessage;

 $connect=mysqli_connect($serverName,$userName,$userPassword,$dbName)or die("connecterror");


 $sql = "SELECT users_id FROM users WHERE  users_uid = '$id' ";
    $result = $connect->query($sql);
    $row=mysqli_fetch_array($result,MYSQLI_NUM);
  
    $collect_users_id = $row[0];
 mysqli_set_charset($connect,"utf8");

 if($category == '1'){

   $query = "INSERT INTO checkin(`checkin_users_uid`,`checkin_users_id`, 
   `checkin_status`, `checkin_type`, `checkin_category`, `checkin_lat`, `checkin_long`, 
   `checkin_ip`, `checkin_mobile`, `checkin_phone`, `checkin_tablet`, `checkin_userAgent`, 
   `checkin_os`, `checkin_iPhone`, `checkin_bot`, `checkin_Webkit`, `checkin_Build`,`checkin_date`,`checkin_time`)
   VALUE ('$id','$collect_users_id','$status','$type','$category','$lat',
   '$long','$ip','
   $mobile','$phone','$tablet','$userAgent','$os','$iPhone','$bot','$Webkit','$Build','$date','$time')";
   $resource = mysqli_query($connect,$query) or die ("error2");


   $sql_notifi="INSERT INTO notification(notification_users_id , notification_type ,  notification_status ,  notification_date 
                ,  notification_time ) VALUE ('$collect_users_id','1','0','$date','$time')";
        mysqli_query($connect,$sql_notifi);

  

  
 }else if($category == '3'){

   $query = "INSERT INTO checkout(`checkout_users_uid`,`checkout_users_id`, 
   `checkout_status`, `checkout_type`, `checkout_category`, `checkout_lat`, `checkout_long`, 
   `checkout_ip`, `checkout_mobile`, `checkout_phone`, `checkout_tablet`, `checkout_userAgent`, 
   `checkout_os`, `checkout_iPhone`, `checkout_bot`, `checkout_Webkit`, `checkout_Build`,`checkout_date`,`checkout_time`)
   VALUE ('$id','$collect_users_id','$status','$type','$category','$lat',
   '$long','$ip','
   $mobile','$phone','$tablet','$userAgent','$os','$iPhone','$bot','$Webkit','$Build','$date','$time')";
   $resource = mysqli_query($connect,$query) or die ("error2");


   $sql_notifi="INSERT INTO notification(notification_users_id , notification_type ,  notification_status ,  notification_date 
   ,  notification_time ) VALUE ('$collect_users_id','2','0','$date','$time')";
mysqli_query($connect,$sql_notifi);

 }else{
      echo " กรุณาติดต่อเจ้าหน้าที่ ";
 }


 echo "<br/><br/>";
 echo '<h1 align="center"><font color="red">*** ขอบคุณที่ทดลองใช้ บริการ ระบบนี้ยังอยู่ในช่วง beta ***</font></h1>';
 echo '<h1 align="center"><font color="red"> กดที่เครื่องหมาย X มุมขวาบนเพื่อปิดหน้าต่างนี้</font></h1>';
 echo("<script>window.location = 'success_checkin.php';</script>");


 
