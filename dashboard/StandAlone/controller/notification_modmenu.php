
<?php
//fetch.php;
if (isset($_POST["view"])) {
    include("../config/dbconnect.php");
    if ($_POST["view"] != '') {
        $update_query = "UPDATE notification SET notification_status =1 WHERE notification_status=0
                    ";
        mysqli_query($conn, $update_query);
    }
    $query = "SELECT * FROM notification  
            LEFT JOIN users on notification.notification_users_id = users.users_id 
            LEFT JOIN avatar on avatar.avatar_users_id = users.users_id
             ORDER BY notification_id DESC LIMIT 5";
    $result = mysqli_query($conn, $query);
    $output = '';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if ($row["notification_type"] == '1') {
                $type = "   <i class='fas fa-check text-success mr-2'></i> เข้างาน";
            } else if ($row["notification_type"] == '2') {
                $type = "   <i class='ni ni-user-run text-warning mr-2'></i> ออกงาน";
            } else if ($row["notification_type"] == '3') {
                $type = "   <i class='fas fa-check text-info mr-2'></i> ลาป่วย / กิจ";
            }

            if ( $row["avatar_img"] != NULL ){
              $avatar=  '<img alt="Image placeholder"  class="avatar rounded-circle" src="./public/fileupload/'.$row["avatar_img"].' "> '; 
            } else{
              $avatar = ' <img alt="Image placeholder" src="assets/img/brand/bot.png" class="avatar rounded-circle"> ';
            }
       

            $output .= '
   <div class="list-group list-group-flush">
                 
   <a href="#!" class="list-group-item list-group-item-action">
     <div class="row align-items-center">
       <div class="col-auto">
         <!-- Avatar -->
              '. $avatar.'
       </div>
       <div class="col ml--2">
         <div class="d-flex justify-content-between align-items-center">
           <div>
             <h4 class="mb-0 text-sm">' . $row["users_fname"] . " " . $row["users_lname"] . '</h4>
           </div>
           <div class="text-right text-muted">
             <small>' . $row["notification_date"] . " " . $row["notification_time"] . '</small>
           </div>
         </div>
          ' . $type .'
       </div>
     </div>
   </a>
 </div>
   ';
        }
    } else {
        $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
    }

    $query_1 = "SELECT * FROM notification WHERE notification_status =0";
    $result_1 = mysqli_query($conn, $query_1);
    $count = mysqli_num_rows($result_1);
    $data = array(
        'notification'   => $output,
        'unseen_notification' => $count
    );
    echo json_encode($data);
}
?>
