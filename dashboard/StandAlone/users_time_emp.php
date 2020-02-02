<?php

$moyear = $_POST['moyear'];
$users_id_users = $_POST['users_id_users'];

require_once("./config/dbconnect.php");

$startdate = '' . $moyear . '-01';
$enddate = '' . $moyear . '-31';
$sql = "SELECT users_id,checkin_date,checkin_time,(select checkout_time from checkout where checkout_users_id = a.users_id and checkout_date = checkin_date)as getcheckout 
from users a left join checkin b on b.checkin_users_id = a.users_id 


WHERE checkin_date  between '$startdate' and '$enddate'

AND checkin_category = '1'

AND users_id = '$users_id_users'

        ";

$result = mysqli_query($conn, $sql);
if (!$result) {
    printf("Error: %s\n", $conn->error);
    exit();
}


$resultArray = array();


while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $checkout_time = $row['getcheckout'];
    $checkin_time = $row['checkin_time'];
    $checkin_date = $row['checkin_date'];


    $resultArray[$row['users_id']][$row['checkin_date']]  = $row['checkin_time'] . "|" . $checkout_time;
}



$sql_users = "SELECT * FROM users 
LEFT JOIN department on users.users_department = department.department_id 
LEFT JOIN section on section.section_department_id = department_id 
LEFT JOIN section_details on section.section_details_id = section_details.section_details_id  
LEFT JOIN avatar on avatar.avatar_users_id = users.users_id
WHERE users_id = '$users_id_users' 
AND users_section = section_id
GROUP BY users_id";

$res = $conn->query($sql_users);
$row_res = $res->fetch_assoc();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        HR bot
    </title>
    
    <link rel="icon" href="./assets/img/brand/favicon.png" type="image/png">
     <!-- Fonts -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
     <!-- Icons -->
     <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
     <link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
     <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
     <!-- Page plugins -->
     <!-- Argon CSS -->
     <link rel="stylesheet" href="./assets/css/argon.css?v=1.1.0" type="text/css">
     <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
    <script src="liff-starter.js"></script>
    
</head>


            <?php include("./config/dbconnect.php"); ?>
          
          
<body class="">
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">

                <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">


                        <!----- MAIN CONTENT ?? --->



<!-- Card body -->
<div class="card-body">

<a href="#!">


    <?php  if ( $row_res["avatar_img"] != NULL ){
                                      echo '<img alt=""  class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 140px;" src="./public/fileupload/'.$row_res["avatar_img"].'">'; 
                                    } else{
                                      echo ' <img alt="" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 140px;" src="assets/img/brand/bot.png">';
                                    }
                                    ?> 
</a>
<div class="pt-4 text-center">
    <h5 class="h3 title">
        <span class="d-block mb-1"><?=  $row_res["users_fname"]?>  <?=  $row_res["users_lname"]?></span> 
        <small class="h4 font-weight-light text-muted"><?=  $row_res["section_name"]?>  <?=  $row_res["department_name"]?></small><br>
        <small class="h4 font-weight-light text-muted">รหัสพนักงาน <?=  $row_res["users_emp_id"]?>  บัตรประชาชน <?=  $row_res["users_citizenid"]?></small>
    </h5>
  
</div>

</div>




</div>




        <div class="table-responsive">
            <div>
                <table class="table align-items-center table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">
                                วัน เดือน ปี
                            </th>
                            <th scope="col">
                                เข้างาน
                            </th>
                            <th scope="col">
                                ออกงาน
                            </th>
                            <th scope="col">
                                หมายเหตุ
                            </th>


                        </tr>
                    </thead>
                    <tbody class="list">

                        <?php foreach ($resultArray as $k_item => $v_data) { ?>

                            <?php for ($i = 0; $i <= 30; $i++) {


                                    $key_date = date("Y-m-d", strtotime($startdate . " +$i day"));

                                    if (isset($v_data[$key_date]) == $key_date) {
                                        $date_data =  $v_data[$key_date];
                                        $time = explode("|", $date_data);
                                    } else {
                                        $time = '--';
                                    }





                                    ?>




                                <tr>
                                    <td class="">

                                        <i class="far fa-calendar"></i>
                                        <?php $date = new DateTime($key_date);


                                                echo $date->format('d-m-Y'); ?>
                                    </td>


                                    <td class="">
                                        <i class="fas fa-check text-success mr-2"></i>
                                        <?php

                                                echo $time[0];

                                                ?>

                                    </td>
                                    <td class="">
                                        <i class="fas fa-clock text-warning mr-2"></i>
                                        <?php

                                                echo $time[1];

                                                ?>
                                    </td>
                                    <td class="">

                                    </td>
                                </tr>
                        <?php
                            }
                        }

                        ?>




                    </tbody>
                </table>
            </div>

        </div>


    </div>
</div>
</div>
</div>




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 






    <!--   Core   -->
    <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>

</body>

</html>