
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    HR bot
  </title>
  <!-- Favicon -->
  <link href="./assets/img/brand/bot.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" /> 
</head>

<?php include ("config/dbconnect.php"); ?>
<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
    
       

        <?php include("mod_menu.php"); ?>
    
    <!-- Header -->
    <!--บน-->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
        <!----- top main content ??? --->   
<?php 

        
$sql = "SELECT COUNT(users_id) AS countEmployee FROM users ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$check_emp_checkin = "SELECT COUNT(checkin_id) AS countCheckinEmp FROM checkin WHERE checkin_date = CAST(CURRENT_TIMESTAMP as DATE) AND `checkin_category` = '1' ";
$result_check_emp_checkin = $conn->query($check_emp_checkin);
$row_stat2 = $result_check_emp_checkin->fetch_assoc();

$check_emp_checkin_yesterday = "SELECT COUNT(checkin_id) AS countCheckinEmp_yesterdays FROM checkin 
WHERE date(checkin_date)=date(date_sub(now(),interval 1 day)) 
AND `checkin_category` = '1'";
$result_check_emp_checkin_yesterday = $conn->query($check_emp_checkin_yesterday);
$row_stat2_yesterday = $result_check_emp_checkin_yesterday->fetch_assoc();



 $todaycount = $row_stat2["countCheckinEmp"];
 $yesterdaycount = $row_stat2_yesterday["countCheckinEmp_yesterdays"];
    // $todaycount = 10000;
    // $yesterdaycount = 65000000;

//print_r($row_stat2);

?>

           <!-- Card stats -->
           <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">จำนวนพนักงานทั้งหมด</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $row["countEmployee"]; ?>   คน</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-muted mr-2"><i class="fa fa-exchange-alt"></i> 0.00%</span>
                    <span class="text-nowrap">จากเดือนที่แล้ว</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">จำนวนพนักงานที่เข้างานวันนี้</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $row_stat2["countCheckinEmp"]; ?>   คน</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                        <i class="fas fa-check"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                      <?php 


                        if($yesterdaycount != '0' || $todaycount != '0' ){
                            
                            if($yesterdaycount < $todaycount ){
                                
                                $global_count = (((abs($yesterdaycount - $todaycount)*100))/$yesterdaycount);
                                $emp_enter_count = substr($global_count,0,strpos($global_count,'.')+3);
                                echo " <span class='text-success mr-2'><i class='fas fa-arrow-up'></i> ".$emp_enter_count." %  </span>";
                                
                            }if($yesterdaycount > $todaycount){

                                $global_count = (((abs($yesterdaycount - $todaycount)*100))/$yesterdaycount);
                                $emp_enter_count = substr($global_count,0,strpos($global_count,'.')+3);
                                echo " <span class='text-warning mr-2'><i class='fas fa-arrow-down'></i> ".$emp_enter_count." %  </span>";
                            }
                        }else{
                                echo "ไม่สามารถประมวลผลได้";
                        }
                        ?>
                    <span class="text-nowrap">จากเมื่อวาน</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">จำนวนคนที่เข้างานเกินเวลาวันนี้</h5>
                      <span class="h2 font-weight-bold mb-0">1</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-clock"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">จากเมื่อวาน</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">จำนวนคนขอลาวันนี้</h5>
                      <span class="h2 font-weight-bold mb-0">1</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-bed"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">จากเมื่อวาน</span>
                  </p>
                </div>
              </div>
            </div>
          </div>


        <!---- main content ?? ---> 
          
</div>  </div> </div>
          <?php include("mod_menu_footer.php"); ?>
  
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
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