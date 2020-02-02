<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        HR bot
    </title>


    <link rel="icon" href="../../dashboard/StandAlone/assets/img/brand/favicon.png" type="image/png">
     <!-- Fonts -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
     <!-- Icons -->
     <link rel="stylesheet" href="../../dashboard/StandAlone/assets/vendor/nucleo/css/nucleo.css" type="text/css">
     <link rel="stylesheet" href="../../dashboard/StandAlone/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
     <script src="../../dashboard/StandAlone/assets/vendor/jquery/dist/jquery.min.js"></script>
     <!-- Page plugins -->
     <!-- Argon CSS -->
     <link rel="stylesheet" href="../../dashboard/StandAlone/assets/css/argon.css?v=1.1.0" type="text/css">
</head>

<?php include("../../dashboard/StandAlone/config/dbconnect.php"); ?>
<?php
date_default_timezone_set("Asia/Bangkok");

$time = date("H:i:s");
$users_id = $_GET["users_id"];
$leave_paper_id = $_GET["leave_paper_id"];


// var_dump($row);
$sql = " SELECT * FROM users LEFT JOIN department on users.users_department = department.department_id 
                LEFT JOIN section on section.section_department_id = department_id 
                LEFT JOIN leave_paper on leave_paper.leave_paper_users_id = users.users_id 
                LEFT JOIN avatar on avatar.avatar_users_id = users.users_id
                WHERE users_id = '$users_id' AND leave_paper_id = '$leave_paper_id'
                ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


$originalDate =  $row["leave_paper_start_date"];
$newDate = date("d-m-Y", strtotime($originalDate));

$originalDate2 =  $row["leave_paper_end_date"];
$newDate2 = date("d-m-Y", strtotime($originalDate2));

$date1=date_create($originalDate);
$date2=date_create($originalDate2);
$diff=date_diff($date1,$date2);


?>


<body class="">
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">

                <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">

                            <div class="row justify-content-center">
                                <div class="col-lg-3 order-lg-2">
                                    <div class="card-profile-image">
                              
                                    <?php  if ( $row["avatar_img"] != NULL ){
                                      echo '<img alt="" class="rounded-circle" width="120" height="120" src="../../dashboard/StandAlone/public/fileupload/'.$row["avatar_img"].'">'; 
                                    } else{
                                        echo '<img alt="" class="rounded-circle" width="120" height="120" src="../../dashboard/StandAlone/assets/img/brand/bot.png'.$row["avatar_img"].'">';
                                    }
                                    ?> 
                                   
                             
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        
                        <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">

                                        <?php 
                                          $typeofpaper = $row["leave_paper_category"]; 
                                        if ($typeofpaper == '0') {
                                            echo ' <h1> <span class="badge badge-secondary">ไม่ถูกระบุ</span></h1>';
                                        }
                                        if ($typeofpaper == '1') {
                                            echo ' <h1> <span class="badge badge-warning">ลาป่วย</span></h1>';
                                        } if ($typeofpaper == '2') {
                                            echo ' <h1> <span class="badge badge-info">ลากิจ</span></h1>';
                                        } if ($typeofpaper == '3') {
                                            echo ' <h1> <span class="badge badge-primary">ลาประเภทอื่นๆ</span></h1>';
                                        }
                            ?>
                                    </div>
                                </div>
                            </div>
                          
                        
             
            
                            <div class="text-center">
                                <h4>
                                <?= $row["users_fname"] ?> <?= $row["users_lname"] ?>
                                </h4>
                                <div class="h5 font-weight-300">
                             รหัสพนักงาน <?= $row["users_emp_id"] ?>  ฝ่าย <?= $row["department_name"] ?>  แผนก <?= $row["section_name"] ?> 
                                </div>
                              

                            <div class="card-body">
                                <form>
                                    <!-- <h6 class="heading-small text-muted mb-4">แบบฟอร์มการลา</h6> -->
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                <label class="form-control-label" for="input-email">วันที่เริ่มต้น</label>
                                                   <h4><?=$newDate ?></h4>
                                                </div>
                                            </div>
                                            <!-- <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email"> <i class="fa fa-arrow-right" aria-hidden="true"></i>ถึง</label><br>
                                                   
                                                </div>
                                            </div> -->
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">วันที่สิ้นสุด</label>
                                                    <h4><?=$newDate2 ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                       
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">รวมเป็นทั้งหมด</label>
                                                    <h4><?= " $diff->d วัน" ?></h4>
                                                </div>
                                            </div>

                                            
                                      
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" >เหตุผลในการลา</label>
                                                    <h4><?= $row["leave_paper_reason"] ?></h4>
                                            </div>
                                        </div>
                                    
                                           
                                      
                                    </div>
                         
                                  
                               
                                    
                              
                                    <!-- Description -->
                            
                                    <!-- <div class="pl-lg-4">
                                        <div class="form-group">
                                            <label>ท่านสามารถระบุ </label>
                                            <textarea rows="4" class="form-control form-control-alternative" placeholder=" ..."></textarea>
                                        </div>
                                    </div> -->
                                </form>
                                <hr class="my-4" />


<div class="container">
    <div class="row">
        <div class="col-sm">
            <button type="button" class="btn btn-success btn-lg btn-block"  data-toggle="modal" data-target="#acceptmodal"> <i class="fa fa-check" aria-hidden="true"></i> อนุมัติ</button>
        </div>
        <div class="col-sm">
            <br>
        </div>
        <div class="col-sm">
            <button type="button" class="btn btn-danger btn-lg btn-block"  data-toggle="modal" data-target="#canclemodal" ><i class="fa fa-times" aria-hidden="true"></i> ไม่อนุมัติ</button>
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


    <?php include("modal_confirm_leave_denied.php");?>
    
    <?php include("modal_confirm_leave_accept.php");?>


    <script src="https://cdn.jsdelivr.net/npm/mobile-detect@1.4.4/mobile-detect.min.js"></script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALSzf_EiskJSQXKSkvGdA4CTwrZ-3MSEI&callback=initMap" async defer></script>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 </html>
 <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</body>

</html>