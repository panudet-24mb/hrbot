
 
 <?php

    // @@AESC PUBLIC 
    // @@DESC -- CHECK IS checkin or out 
    // @@route -- SAVE.php
    include("../../dashboard/StandAlone/config/dbconnect.php");

    // $myuid = $_COOKIE['myUid'];


    $myuid = $_POST['uid'];
    // echo "TEST" . $myuid; 

    //Query Name
    $checkuid_query = "SELECT * FROM users WHERE users_uid = '$myuid' ";
    $result = $conn->query($checkuid_query);
    $row = $result->fetch_assoc();

    //Query Checking 

    $countemp = "SELECT COUNT(checkin_id) AS countCheckin FROM checkin WHERE checkin_users_uid= '$myuid' AND checkin_date = CAST(CURRENT_TIMESTAMP as DATE) ";
    $resultcount = $conn->query($countemp);
    $rowcount = $resultcount->fetch_assoc();
    $total = $rowcount["countCheckin"];

    $countCheckout = "SELECT COUNT(checkout_id) AS countCheckout FROM checkout WHERE checkout_users_uid= '$myuid' 
AND checkout_category = '3'
AND checkout_date = CAST(CURRENT_TIMESTAMP as DATE) ";
    $resultcountout = $conn->query($countCheckout);
    $rowcountout = $resultcountout->fetch_array();
    $totalout = $rowcountout["countCheckout"];

    if ($row["users_active"] == '2') {
        echo json_encode(array("statusCode" => 204)); //พักงาน
    }else if ($row["users_active"] == '3'){
        echo json_encode(array("statusCode" => 205)); //หมดพนักงานงาน
    } else {



        if ($totalout == '0') {


            if ($total == '0') {
                //ยังไม่ได้เข้างาน
                echo json_encode(array("statusCode" => 200));
            } else if ($total >= '1') {
                //เข้างานแล้ว
                echo json_encode(array("statusCode" => 201));
            } else {
                // echo "คุณไม่ได้เป็นพนักงาน";
                echo json_encode(array("statusCode" => 202));
            }
        } else {

            // echo "คุณได้ทำการออกงานไปแล้วค่ะ ไว้กลับมาทำงานอีกพรุ้งนี้นะคะ";
            echo json_encode(array("statusCode" => 203));
        }
    }
    ?>




