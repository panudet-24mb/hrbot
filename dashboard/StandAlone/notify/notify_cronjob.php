<?php 

require 'notify_controller.php';

$token = "47JUn0U9tfNJ3ibOUFbgRP0fkEUzg5A80vymCVagriE"; //config in save.php 

require '../config/dbconnect.php';

$check_emp_checkin = "SELECT COUNT(checkin_id) AS countCheckinEmp FROM checkin WHERE checkin_date = CAST(CURRENT_TIMESTAMP as DATE) AND `checkin_category` = '1' ";
$result_check_emp_checkin = $conn->query($check_emp_checkin);
$row_stat2 = $result_check_emp_checkin->fetch_assoc();

$check_emp_out = "SELECT COUNT(checkout_id) AS count_emp_out FROM checkout WHERE checkout_date = CAST(CURRENT_TIMESTAMP as DATE) AND `checkout_category` = '3'";
            $result_check_out = $conn->query($check_emp_out);
            $row_result_check_out = $result_check_out->fetch_assoc();


            $checkout = $row_result_check_out["count_emp_out"];
            $todaycount = $row_stat2["countCheckinEmp"];


$str = "สวัสดีค่ะท่าน HR น้องพีขอแจ้งข่าวค่ะ\n ======================\nมีการเช็คอินในวันนี้".$todaycount."คน ค่ะ \nและมีการเช็คเอ้าท์".$checkout."คน ค่ะ\nท่านสามารถตั้งค่าเว็บ\nการแจ้งเตือนได้ในระบบนะค่ะ \nโดยตอนนี้ถูกตั้งไว้เวลา สี่ทุ่ม ค่ะ ";


 notify_message($str,$token);

 