<?php
require_once("config/dbconnect.php");

$startdate = '2019-12-01';
$enddate = '2019-12-04';
$sql = "SELECT users_id,checkin_date,checkin_time,(select checkout_time from checkout where checkout_users_id = a.users_id and checkout_date = checkin_date)as getcheckout 
from users a left join checkin b on b.checkin_users_id = a.users_id 

WHERE checkin_date  between '$startdate' and '$enddate'

AND checkin_category = '1'

        ";

$result = mysqli_query($conn, $sql);
if (!$result) {
    printf("Error: %s\n", $conn->error);
    exit();
}

// $resultArray = array();
// while ($resultx = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//     array_push($resultArray, $resultx);
// }
$resultArray = array();
$resultArray2 = array();

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $checkout_time = $row['getcheckout'];
    $checkin_time = $row['checkin_time'];
    $checkin_date = $row['checkin_date'];
  

        $resultArray[$row['users_id']][$row['checkin_date']]  = $row['checkin_time']."|".$checkout_time  ;   
        // $resultArray2[$row['users_id']][$row['checkout_date']]  = $row['checkout_time'];
    // if (isset($resultArray[$row['users_id']][$row['checkin_date']]) || isset($resultArray2[$row['users_id']][$row['checkout_date']])) {
        //   $resultArray[$row['users_id']][$row['checkin_date']]  = $row['checkin_time'];   
        //  $resultArray2[$row['users_id']][$row['checkout_date']]  = $row['checkout_time'];
    // } else { // ถ้ายังไม่มีให้เท่ากับ 1

  
    //      $resultArray[$row['users_id']][$row['checkin_date']] =  $row['checkin_time'];
    //      $resultArray2[$row['users_id'] ][$row['checkout_date']]  = $row['checkout_time'];


    
    }
// }
echo '<pre>';
var_dump($resultArray);
echo '</pre><hr />';


// echo '<pre>';
// var_dump(array_merge($resultArray,$resultArray2));
// echo '</pre><hr />';


?>


<table border="1" cellpadding="0" cellspacing="2">
    <tr class="header_row">
        <td class="col_50">#</td>
        <td class="col_200">Item</td>
        <td class="col_200">Item</td>
        <td class="col_200">Item</td>
        <?php for ($i = 1; $i <= 30; $i++) { ?>
            <td class="col_350"><?= $i ?></td>
        <?php } ?>
        <td class="col_100">Total</td>
    </tr>

    <?php

            // $destinationArray = array_merge($resultArray, $resultArray2 ); 
            // echo '<pre>';
            // var_dump($destinationArray);
            // echo '</pre><hr />';
            
    if ($resultArray) {
        // $total_data = count($resultArray);

 
      

        foreach ($resultArray as $k_item => $v_data) {
        
              
           
            
            //  $dateorder = date('d', strtotime($v_data["checkin_date"]));

            ?>


            <tr class="header_row">
                <td></td>
                <td><?= $k_item ?></td>
                <td><?= $k_item ?></td>
                <td><?= $k_item ?></td>

                <!-- statement check Date -->
                <?php for ($i = 0; $i <= 30; $i++) {

                            $key_date = date("Y-m-d", strtotime($startdate . " +$i day"));


                            //   echo $key_date;
                   
                            if (isset($v_data[$key_date]) == $key_date) { ?>
         

                              <?php  echo '<td>'.$v_data[$key_date].'</td>' ?>
                              <!-- <?php  echo '<td> '.$v2_data[$key_date].'</td>' ?> -->


                <?php
                
                            } else {
                                echo '<td> no data </td>';
                            }
                        } ?>

                <!-- Statement check time  -->

               

            </tr>
    <?php
            }
        }
    
    ?>