<?php 


  //  notification / 1 เข้างาน / 2 ออกงาน / 3 ลา

function notification($data){
    
    $data_values=implode(",",$data);

   $sql_notifi="INSERT INTO notification(notification_users_id , notification_type ,  notification_status ,  notification_date ,  notification_time ) 
        VALUES (".$data_values.")";
    mysqli_query($conn, $sql_notifi) or die ("error2");
  }





?>