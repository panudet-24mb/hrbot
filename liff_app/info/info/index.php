<?php 

$myuid = $_COOKIE['myUid'];

include("../../../dashboard/StandAlone/config/dbconnect.php"); 
date_default_timezone_set("Asia/Bangkok");



$checkuid_query = 
"SELECT * FROM users 
  LEFT JOIN department on users.users_department = department.department_id 
                LEFT JOIN section on section.section_department_id = department_id 
                LEFT JOIN section_details on section.section_details_id = section_details.section_details_id 
                LEFT JOIN avatar on avatar.avatar_users_id = users.users_id
WHERE users_uid = '$myuid' 
AND users_section = section_id
GROUP BY users_id";
$result = $conn->query($checkuid_query);
$row = $result->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        HR bot
    </title>
    
    <link rel="icon" href="../../../dashboard/StandAlone/assets/img/brand/favicon.png" type="image/png">
     <!-- Fonts -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
     <!-- Icons -->
     <link rel="stylesheet" href="../../../dashboard/StandAlone/assets/vendor/nucleo/css/nucleo.css" type="text/css">
     <link rel="stylesheet" href="../../../dashboard/StandAlone/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
     <script src="../../../dashboard/StandAlone/assets/vendor/jquery/dist/jquery.min.js"></script>
     <!-- Page plugins -->
     <!-- Argon CSS -->
     <link rel="stylesheet" href="../../../dashboard/StandAlone/assets/css/argon.css?v=1.1.0" type="text/css">
     <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
    <script src="liff-starter.js"></script>
</head>




<body class="">
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">

                <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">

                
            <!----- MAIN CONTENT ?? --->

            <div class="row">
                <div class="col-xl-4 order-xl-1 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                    

                                        <?php  if ( $row["avatar_img"] != NULL ){
                                      echo '<img alt=""  class="rounded-circle"  src="../../../dashboard/StandAlone/public/fileupload/'.$row["avatar_img"].'">'; 
                                    } else{
                                      echo ' <img alt=""class="rounded-circle" src="./../../dashboard/StandAlone/assets/img/brand/bot.png">';
                                    }
                                    ?> 
                                        
                                    </a>

                                </div>

                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">

                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <?php if ($row["users_active"] == '0') {
                                            echo '<span class="badge badge-dot mr-3"> 
                            <i class="bg-warning"></i> ยังไม่มีข้อมูลพนักงาน
                            </span> ';
                                        }
                                        if ($row["users_active"] == '1') {
                                            echo '<span class="badge badge-dot mr-3"> 
                            <i class="bg-success"></i> มีสถานะพนักงาน
                            </span> ';
                                        } if ($row["users_active"] == '2') {
                                            echo '<span class="badge badge-dot mr-3"> 
                            <i class="bg-primary"></i> พักงาน
                            </span> ';
                                        } if ($row["users_active"] == '3') {
                                            echo '<span class="badge badge-dot mr-3"> 
                            <i class="bg-danger"></i> หมดสถานะพนักงาน
                            </span> ';
                                        }
                            ?>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <div>
                                    แผนก <i class="mr-2"></i><?= $row["department_name"] ?>
                                    ฝ่าย <i class="mr-2"></i><?= $row["section_name"] ?>
                                    <br>
                                    <br>   
                                 
                                </div>
                                <hr class="my-4" />
                                <div class="h5 mt-1">
                                    <i class="mr-2"></i>
                                    <div class="d-flex">
                                        <div>
                                            ชื่อพนักงาน
                                        </div>
                                        <div class="ml-auto">
                                            <?= $row["users_fname"] . " " . $row["users_lname"] ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="h5 mt-1">
                                    <i class="mr-2"></i>
                                    <div class="d-flex">
                                        <div>
                                            รหัสพนักงาน
                                        </div>
                                        <div class="ml-auto">
                                            <?php if ($row["users_emp_id"] == "") {
                                                echo "ไม่มีข้อมูลค่ะ";
                                            } else {
                                                echo $row["users_emp_id"];
                                            }  ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="h5 mt-1">
                                    <i class="mr-2"></i>
                                    <div class="d-flex">
                                        <div>
                                            เบอร์โทรศัพท์ติดต่อ
                                        </div>
                                        <div class="ml-auto">
                                            <?php if ($row["users_mobile"] == "") {
                                                echo "ไม่มีข้อมูลค่ะ";
                                            } else {
                                                echo $row["users_mobile"];
                                            }
                                            ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="h5 mt-1">
                                    <i class="mr-2"></i>
                                    <div class="d-flex">
                                        <div>
                                            ที่อยู่
                                        </div>
                                        <div class="ml-auto">
                                            <?php if ($row["users_address"] == "") {
                                                echo "ไม่มีข้อมูลค่ะ";
                                            } else {
                                                echo $row["users_address"];
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="h5 mt-1">
                                        <i class="mr-2"></i>
                                        <div class="d-flex">
                                            <div>
                                                วันเกิด
                                            </div>
                                            <div class="ml-auto">
                                                <?php if ($row["users_birthday"] == "0000-00-00") {
                                                    echo "ไม่มีข้อมูลค่ะ";
                                                } else {
                                                    echo date("d-m-Y", strtotime($row["users_birthday"]));
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="h5 mt-1">
                                        <i class="mr-2"></i>
                                        <div class="d-flex">
                                            <div>
                                                เพศ
                                            </div>
                                            <div class="ml-auto">
                                                <?php if ($row["users_gender"] == "0") {
                                                    echo "ไม่มีข้อมูลค่ะ";
                                                } else {
                                                    if ($row["users_gender"] == '1') {
                                                        echo "เพศชาย";
                                                    }
                                                    if ($row["users_gender"] == '2') {
                                                        echo "เพศหญิง";
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <hr class="my-4" />

                              
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
    <script src="../../../dashboard/StandAlone/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../../../dashboard/StandAlone/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <script src="../../../dashboard/StandAlone/assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="../../../dashboard/StandAlone/assets/vendor/chart.js/dist/Chart.extension.js"></script>

</body>

</html>