<?php

$myuid = $_COOKIE['myUid'];

include("../../../dashboard/StandAlone/config/dbconnect.php");
include("../../../dashboard/StandAlone/config/pagination.php");
date_default_timezone_set("Asia/Bangkok");




  //Method to Query pagination 
  $num = 0;
  $sql= " SELECT * FROM users 
  LEFT JOIN department on users.users_department = department.department_id 
  LEFT JOIN section on section.section_department_id = department_id 
  LEFT JOIN leave_paper on leave_paper.leave_paper_users_id = users.users_id
  LEFT JOIN avatar on avatar.avatar_users_id = users.users_id
  WHERE users_uid = '$myuid' 
  GROUP BY leave_paper_id
  ";
 


  //////////////////// MORE QUERY 
  $result = $conn->query($sql);
  $got = $result->fetch_assoc();
  $total = $result->num_rows;
  $e_page = 5; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
  $step_num = 0;
  if (!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] == 1)) {
    $_GET['page'] = 1;
    $step_num = 0;
    $s_page = 0;
  } else {
    $s_page = $_GET['page'] - 1;
    $step_num = $_GET['page'] - 1;
    $s_page = $s_page * $e_page;
  }
  $sql.= " ORDER BY leave_paper_id  DESC LIMIT " . $s_page . ",$e_page";
  $result = $conn->query($sql);


  $sqllist = "SELECT * FROM leave_paper ORDER BY leave_paper_id";
  $get = $conn->query($sqllist);


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

<style>
.timeline {
    list-style: none;
    padding: 20px 0 20px;
    position: relative;
}

    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eeeeee;
        left: 50%;
        margin-left: -1.5px;
    }

    .timeline > li {
        margin-bottom: 20px;
        position: relative;
    }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li > .timeline-panel {
            width: 46%;
            float: left;
            border: 1px solid #d4d4d4;
            border-radius: 2px;
            padding: 20px;
            position: relative;
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        }

            .timeline > li > .timeline-panel:before {
                position: absolute;
                top: 26px;
                right: -15px;
                display: inline-block;
                border-top: 15px solid transparent;
                border-left: 15px solid #ccc;
                border-right: 0 solid #ccc;
                border-bottom: 15px solid transparent;
                content: " ";
            }

            .timeline > li > .timeline-panel:after {
                position: absolute;
                top: 27px;
                right: -14px;
                display: inline-block;
                border-top: 14px solid transparent;
                border-left: 14px solid #fff;
                border-right: 0 solid #fff;
                border-bottom: 14px solid transparent;
                content: " ";
            }

        .timeline > li > .timeline-badge {
            color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
            text-align: center;
            position: absolute;
            top: 16px;
            left: 50%;
            margin-left: -25px;
            background-color: #999999;
            z-index: 100;
            border-top-right-radius: 50%;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            border-bottom-left-radius: 50%;
        }

        .timeline > li.timeline-inverted > .timeline-panel {
            float: right;
        }

            .timeline > li.timeline-inverted > .timeline-panel:before {
                border-left-width: 0;
                border-right-width: 15px;
                left: -15px;
                right: auto;
            }

            .timeline > li.timeline-inverted > .timeline-panel:after {
                border-left-width: 0;
                border-right-width: 14px;
                left: -14px;
                right: auto;
            }

.timeline-badge.primary {
    background-color: #2e6da4 !important;
}

.timeline-badge.success {
    background-color: #3f903f !important;
}

.timeline-badge.warning {
    background-color: #f0ad4e !important;
}

.timeline-badge.danger {
    background-color: #d9534f !important;
}

.timeline-badge.info {
    background-color: #5bc0de !important;
}

.timeline-title {
    margin-top: 0;
    color: inherit;
}

.timeline-body > p,
.timeline-body > ul {
    margin-bottom: 0;
}

    .timeline-body > p + p {
        margin-top: 5px;
    }

@media (max-width: 767px) {
    ul.timeline:before {
        left: 40px;
    }

    ul.timeline > li > .timeline-panel {
        width: calc(100% - 90px);
        width: -moz-calc(100% - 90px);
        width: -webkit-calc(100% - 90px);
    }

    ul.timeline > li > .timeline-badge {
        left: 15px;
        margin-left: 0;
        top: 16px;
    }

    ul.timeline > li > .timeline-panel {
        float: right;
    }

        ul.timeline > li > .timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        ul.timeline > li > .timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }
}

</style>




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
                                   
                                        

                                            <div class="container">
    <div class="page-header">
        <h1 id="timeline">ประวัติการลาของคุณ </h1>
        <p><?= $got["users_fname"]." ".$got["users_lname"]?></p>
        <p><?="รหัสพนักงาน".$got["users_emp_id"]?></p>
    </div>
    <ul class="timeline">

    <?php 
        if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
            while ($row = $result->fetch_assoc()) { // วนลูปแสดงรายการ
              $num++;

              ?>
    
   

        <li>
          <?php 
          $l = $row["leave_paper_confirm"];  
          if ($l =='0'){
              echo '<div class="timeline-badge info"> <i class="fas fa-clock" aria-hidden="true"></i> </div> ';
          }else if ($l == '1') {
            echo '<div class="timeline-badge danger"> <i class="fa fa-times" aria-hidden="true"></i></div>';
          }else if ($l == '2'){
            echo '<div class="timeline-badge success"> <i class="fa fa-check" aria-hidden="true"></i></div>';
          }
          ?> 
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">
              
              <?php
                        // $dateleave = $row["leave_paper_created"];
                        // $new_date = date("d/m/Y", strtotime($dateleave));
               
                        // echo "วันที่กรอกฟอร์ม ". $new_date;
                        $leave_type = $row["leave_paper_category"];
                        if($leave_type == '1'){
                                echo 'ลาป่วย';
                        }else if ($leave_type == '2'){
                            echo 'ลากิจ';
                        }else if ($leave_type == '3'){
                            echo 'ลาประเภทอื่น';
                        }
              
              
              ?></h4>
              <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 
              
              <?php 
              
              $datestart = $row["leave_paper_start_date"];
              $datestart_1 = date("d/m/Y", strtotime($datestart));
              $dateend = $row["leave_paper_end_date"];
              $dateend_1 = date("d/m/Y", strtotime($dateend));

              echo $datestart_1." - ".$dateend_1;
             
    
              
              ?>
              
              </small></p>
            </div>
            <div class="timeline-body">
              <p>สาเหตุ:  <?= $row["leave_paper_reason"]?></p> 
            </div>
  
            <?php if ( $row["leave_paper_confirm_reason"] != null ){ ?>
                <hr>
            <div class="timeline-body">
              <p>ข้อความจากฝ่ายบุคคล:  <?= $row["leave_paper_confirm_reason"]?></p> 
            </div>

            <?php }else {} ?>
          </div>
        </li>


        <?php
                  }
                }
                ?>
    </ul>
</div>

<div class="card-footer py-4">
          <nav aria-label="...">
            <ul class="pagination justify-content-end mb-0">
              <?php
             page_navi($total,(isset($_GET['page']))?$_GET['page']:1,$e_page,$_GET);
              ?>
            </ul>
          </nav>
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