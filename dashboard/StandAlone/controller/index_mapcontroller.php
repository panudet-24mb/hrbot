<?php

header('Content-Type: application/json');
include("../config/dbconnect.php");
$sql = "SELECT 
checkin_users_id , checkin_lat , checkin_long , checkin_time , checkin_date ,users_fname , users_lname
FROM checkin 
LEFT JOIN users on users.users_id = checkin.checkin_users_id  
WHERE checkin_date = CAST(CURRENT_TIMESTAMP as DATE) 
AND `checkin_category` = '1' ";
$Objquery = mysqli_query($conn,$sql);
$resultArray = array();
while ($Obresult = mysqli_fetch_assoc($Objquery)){
    array_push($resultArray,$Obresult);
}
    echo json_encode($resultArray);


?>