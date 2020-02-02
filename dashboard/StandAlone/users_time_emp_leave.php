


<?php include("middleware/middleware.php"); ?>
<?php include('config/css-headconfig.php'); ?>
<?php include("config/dbconnect.php"); ?>
<?php require_once("config/pagination_withget.php"); 

// $moyear = $_POST['moyear'];
$users_id_users = $_GET['users_id_users'];




            //Method to Query pagination 
            $num = 0;
            $get_leave = " SELECT * , users_fname , users_lname  , users_id FROM leave_paper 
            LEFT JOIN users on users.users_id = leave_paper.leave_paper_users_id 
            LEFT JOIN avatar on avatar.avatar_users_id = users.users_id
             WHERE users_id = '$users_id_users'
            ";
            $result = $conn->query($get_leave);
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
            $get_leave .= " ORDER BY leave_paper_id  DESC LIMIT " . $s_page . ",$e_page";
            $result = $conn->query($get_leave);


?>




<body>

    <?php include("component/mod_menu.php"); ?>



    <div class="header bg-gradient-primary pb-12 pt-8 pt-md-12"> </div>

    <div class="container-fluid  mt--7">
        <div class="header-body"></div>
<!-- Table -->
<br>
            <div class="row">
              <div class="col">
                <div class="card shadow">
                  <div class="card-header border-0">
                    <h3 class="mb-0"> รายละเอียดการลา</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">โปรไฟล์</th>
                          <th scope="col">ชื่อ</th>
                          <th scope="col">ประเภท</th>
                          <th scope="col">สาเหตุ</th>
                          <th scope="col">สถานะ</th>
                          <th scope="col">วันที่</th>
                          <th scope="col">ติดตาม</th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                          while ($row = $result->fetch_assoc()) { // วนลูปแสดงรายการ
                            $num++;
                            
                            ?>
                            <tr>
                              <th scope="row">
                                <div class="media align-items-center">
                                  <a href="#">
                                    <?php  if ( $row["avatar_img"] != NULL ){
                                      echo '<img alt=""  class="rounded-circle" width="60" height="60" src="./public/fileupload/'.$row["avatar_img"].'">'; 
                                    } else{
                                      echo ' <img alt=""  class="rounded-circle" width="60" height="60"  src="assets/img/brand/bot.png">';
                                    }
                                    ?> 
                                   
                                  </a>
                                  <div class="media-body">
                                    
                                  </div>
                                </div>
                              </th>
                              <td>
                                <?=$row["users_fname"]."   ".$row["users_lname"]; ?>
                              </td>
                              <td>
                              <?php 

                              $typeofpaper = $row["leave_paper_category"]; 
                              
                                  if($typeofpaper == '1'){
                                    $global = '<span class="badge badge-pill badge-warning">ลาป่วย</span>';
                                  }else if($typeofpaper== '2'){
                                    $global = '<span class="badge badge-pill badge-info">ลากิจ</span>';
                                  }else {
                                    $global = '<span class="badge badge-pill badge-default">ลาประเภทอื่นๆ</span>';
                                  }

                                  echo $global;
                              
                              ?>
                              </td>
                              <td>
                                <?=$row["leave_paper_reason"]; ?>
                          </td>
                              <td>
                                <?php 
                                
                                if($row["leave_paper_confirm"] == '0'){
                                  echo '<span class="badge badge-dot mr-4">
                                  <i class="bg-info"></i> ยังไม่ได้รับการอนุมัติ
                                </span>';
                                }
                                if($row["leave_paper_confirm"] == '1'){
                                  echo '<span class="badge badge-dot mr-4">
                                  <i class="bg-danger"></i>ไม่ได้รับการอนุมัติ
                                </span>';
                                }
                                if($row["leave_paper_confirm"] == '2'){
                                  echo '<span class="badge badge-dot mr-4">
                                  <i class="bg-success"></i> ได้รับการอนุมัติ
                                </span>';
                                }
                                
                                ?>
                                <!-- <span class="badge badge-dot mr-4">
                                  <i class="bg-warning"></i> ยังไม่ได้รับการอนุมัติ
                                </span> -->
                              </td>
                              <td>
                                <div class="avatar-group">
                                  <?php 
                                  $originalDate1 =  $row["leave_paper_created"];
                                  $newDate1 = date("d-m-Y", strtotime($originalDate1));
                                  echo $newDate1;
                                  ?>
                                  </a>
                                 
                                </div>
                              </td>
                             
                              <td >
                              <a href="../../liff_app/confirm_leave/index.php?users_id=<?= $row['users_id']?>&leave_paper_id=<?= $row['leave_paper_id']?>" class="btn btn-default">ตรวจสอบ</a>
                            
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
                <div class="card-footer py-4">
                  <nav aria-label="...">
                    <ul class="pagination justify-content-end mb-0">
                    <?php
                    page_navi_custom($total, $users_id_users ,(isset($_GET['page'])) ? $_GET['page'] : 1, $e_page);
                    ?>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>


        
    </div>



    <?php include("component/mod_menu_footer.php"); ?>


    <?php include('config/scipts-config.php'); ?>
</body>

</html>