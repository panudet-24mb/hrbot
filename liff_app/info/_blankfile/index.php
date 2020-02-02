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
    <!-- Favicon -->
    <link href="../../../dashboard/StandAlone/./assets/img/brand/bot.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="../../../dashboard/StandAlone/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="../../../dashboard/StandAlone/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../../../dashboard/StandAlone/assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
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
                                                    <img src="../../../dashboard/StandAlone/assets/img/brand/bot.png" class="rounded-circle">

                                                </a>

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
    <script src="../../../dashboard/StandAlone/assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../../../dashboard/StandAlone/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <script src="../../../dashboard/StandAlone/assets/js/plugins/chart.js/dist/Chart.min.js"></script>
    <script src="../../../dashboard/StandAlone/assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
    <!--   Argon JS   -->
    <script src="../../../dashboard/StandAlone/assets/js/argon-dashboard.min.js?v=1.1.0"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-dashboard-free"
            });
    </script>
</body>

</html>