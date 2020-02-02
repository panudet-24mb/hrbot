<?php

$myuid = $_COOKIE['myUid'];

include("../../../dashboard/StandAlone/config/dbconnect.php");
date_default_timezone_set("Asia/Bangkok");



$checkuid_query =
    "SELECT * FROM users 
  LEFT JOIN department on users.users_department = department.department_id 
                LEFT JOIN section on section.section_department_id = department_id 
                LEFT JOIN section_details on section.section_details_id = section_details.section_details_id 
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

     

                        <!----- MAIN CONTENT ?? --->

                                   
<form action = "check_time.php" name = "myForm_time" method ="post">
<div class="modal fade" id="myModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เลือกเดือนที่ต้องการตรวจสอบประวัติการเข้างาน </h5>
                 
                <button type="button" id ="closewindowbutton1" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input id="mypicker" name="moyear" class="form-control" data-date-format="dd-mm-yyyy" id="date" placeholder="เลือกเดือนที่ต้องการตรวจสอบ" type="text" value="" readonly>    
                     
                    </div>
                </div>

            </div>

            <input  name="users_id_users" class="form-control" type="hidden" value="<?= $row["users_id"] ?>">  


            <div class="modal-footer">
                <button type="button" id="closewindowbutton2" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="submit" id="btn_submit" onsubmit="return validateForm()" class="btn btn-primary">ตรวจสอบ</button>
            </div>
            </form>

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
   
    <script src="../../../dashboard/StandAlone/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <script src="../../../dashboard/StandAlone/assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="../../../dashboard/StandAlone/assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="../../../dashboard/StandAlone/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>



</script>


<script>
$(document).ready(function(){

    $("#myModal").modal();

});
</script>


<script>

$(function() 
  {   $( "#mypicker" ).datepicker({
    format: "yyyy-mm",
    viewMode: "months", 
    minViewMode: "months"
     });
   });

   document.getElementById('closewindowbutton1').addEventListener('click', function () {
        liff.closeWindow();
    });
    document.getElementById('closewindowbutton2').addEventListener('click', function () {
        liff.closeWindow();
    });
</script>

</body>

</html>