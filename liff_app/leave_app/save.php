<?php




date_default_timezone_set("Asia/Bangkok");
$date = date("Y-m-d");
$time = date("H:i:s");

include("../../dashboard/StandAlone/config/dbconnect.php");
$id = $_REQUEST['userid'];
$type = $_REQUEST['gethourleave'];
$lat = $_REQUEST['lat'];
$long = $_REQUEST['long'];
$getcounthour = $_REQUEST['getcounthour'];
$reason = $_REQUEST['leave_reason'];
$startdate =  $_REQUEST['input_from'];
$enddate = $_REQUEST['input_to'];
$category = $_REQUEST['category'];

$start = strtotime($startdate);
$end = strtotime($enddate);

$days_between = ceil(abs($end - $start) / 86400);


$date1 = date("d/M/Y",strtotime($startdate));

$date2 = date("d/M/Y",strtotime($enddate));




// echo $fullname;
// // echo $id;
// // echo $info;echo $pic;
// echo $statusMessage;

 $connect=mysqli_connect($serverName,$userName,$userPassword,$dbName)or die("connecterror");
 mysqli_set_charset($connect,"utf8");

 $sql = "SELECT users_id , users_fname,users_lname FROM users WHERE  users_uid = '$id' ";
    $result = $connect->query($sql);
    $row=mysqli_fetch_array($result,MYSQLI_NUM);
  
    $collect_users_id = $row[0];
    $collect_users_fname = $row[1];
    $collect_users_lname = $row[2];




 $query = "INSERT INTO leave_paper(leave_paper_category,leave_paper_type,leave_paper_count_hour,leave_paper_reason,leave_paper_lat,leave_paper_long,leave_paper_start_date,leave_paper_end_date,leave_paper_users_id,leave_paper_users_uid,leave_paper_created
) VALUE ('$category','$type','$getcounthour','$reason','$lat','$long','$startdate','$enddate','$collect_users_id','$id',NOW())";
 $resource = mysqli_query($connect,$query) or die ("error2");
  $last_id = $connect->insert_id;

 if($query){

   // if($days_between = '0'){
   //    $day_show = '1';
   // }else{
   //    $day_show = $days_between;
   // }

   require 'Pushmessage.php';
   include('../../dashboard/StandAlone/config/token.php');

   
   // $token = "47JUn0U9tfNJ3ibOUFbgRP0fkEUzg5A80vymCVagriE"; //config in save.php 
   
   $str = "คุณ ".$collect_users_fname." ".$collect_users_lname."\n ได้ทำการขอลาเนื่องจาก :".$reason."\n ตั้งแต่วันที่ :"
   
         .$date1 ."\n จนถึงวันที่ " .$date2 ."\n โปรดพิจารณาด้วยค่ะตาม URL นี้ \n https://www.pnall.co.th/apps/line/hrbot/liff_app/confirm_leave/?users_id=".$collect_users_id."&leave_paper_id=".$last_id."";
   
   
   notify_message($str,$token);
   $hrgroup = "gqsqEjBj8rEne0mzE8hDYtPg5CREo7EpbUXnhChM63Z";
   notify_message($str,$hrgroup);
   
   echo("<script>window.location = 'success_leave.php';</script>");


    }else{
       echo 'ERROR';
    }


 
?>