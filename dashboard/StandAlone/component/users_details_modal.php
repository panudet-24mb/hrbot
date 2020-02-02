<style>
    .swal2-container {
        z-index: 10000;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="editmodal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ประวัติ </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controller/users_details_modal_save.php" id="myForm" method="post">
                <br>
               
                <div class="card-profile-image">
                                <img src="assets/img/brand/bot.png" id="preview" class="rounded-circle">
                </div>
                                <br>
                                <br>
                                   <!-- File browser -->
           
              <!-- Card header -->
              
              <!-- Card body -->
              <div class="card-body">
              
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fileupload" name="fileupload" onchange="readURL(this);" lang="en">
                    <label class="custom-file-label" for="fileupload">อัพโหลดรูปภาพ
                  </div>
             
              </div>
         
                                <br>
    
                <input type="hidden" class="form-control" id="users_id" name="users_id" value="<?php echo $row["users_id"]; ?>">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>ชื่อ และ นามสกุล</h6>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" name="fname" id ="fname" class="form-control" value="<?php echo $row["users_fname"]; ?>" />
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $row["users_lname"]; ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>รหัสพนักงาน</h6>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <input type="text" name="emp_id" id="emp_id" class="form-control" value="<?php echo $row["users_emp_id"]; ?>" />
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>เบอร์ติดต่อ</h6>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $row["users_mobile"]; ?>" />
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>ที่อยู่</h6>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <input type="text" name="address" id="address" class="form-control" value="<?php echo $row["users_address"]; ?>" />
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>วันเกิด</h6>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative" id="date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input name="bd" data-provide="datepicker" class="form-control" data-date-format="dd-mm-yyyy" id="bd" placeholder="Select date" type="text" value="<?php


                                                                                                                                                                                                $bd = $row["users_birthday"];

                                                                                                                                                                                                if ($bd == "0000-00-00") {
                                                                                                                                                                                                    echo "ไม่มีข้อมูล";
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    $timestamp = strtotime($bd);
                                                                                                                                                                                                    $new_date = date("d-m-Y", $timestamp);
                                                                                                                                                                                                    echo $new_date;
                                                                                                                                                                                                }


                                                                                                                                                                                                ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>เพศ</h6>
                            </div>

                        </div>
                        <div class="col-md-10">

                            <select class="form-control" id="gender" name="gender">
                                <option value="0" selected disabled hidden>
                                    <?php  $g =$row["users_gender"]; if($g=="0"){echo '<option value="0" selected="selected" >กรุณาเลือกเพศ</option>';} if ($g=="1"){echo '<option value="1" selected="selected" >ชาย</option>';}if($g=="2"){echo '<option value="2" selected="selected" >หญิง</option>';} ?>
                                </option>
                                <option value="1">ชาย</option>

                                <option value="2">หญิง</option>

                            </select>
                        </div>



                    </div>
                    <br>


                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>วันที่เริ่มงาน</h6>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative" id="date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input data-provide="datepicker" id ="startjob" name="startjob" class="form-control" data-date-format="dd-mm-yyyy" id="date" placeholder="Select date" type="text" value="<?php


                                                                                                                                                                                                    $bd = $row["users_startjob"];

                                                                                                                                                                                                    if ($bd == "0000-00-00") {
                                                                                                                                                                                                        echo "ไม่มีข้อมูล";
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        $timestamp = strtotime($bd);
                                                                                                                                                                                                        $new_date = date("d-m-Y", $timestamp);
                                                                                                                                                                                                        echo $new_date;
                                                                                                                                                                                                    }


                                                                                                                                                                                                    ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>วันที่ผ่านโปร</h6>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative" id="date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input data-provide="datepicker" id="pro" name="pro" class="form-control" data-date-format="dd-mm-yyyy" id="date" placeholder="Select date" type="text" value="<?php


                                                                                                                                                                                                $bd = $row["users_probationary"];

                                                                                                                                                                                                if ($bd == "0000-00-00") {
                                                                                                                                                                                                    echo "ไม่มีข้อมูล";
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    $timestamp = strtotime($bd);
                                                                                                                                                                                                    $new_date = date("d-m-Y", $timestamp);
                                                                                                                                                                                                    echo $new_date;
                                                                                                                                                                                                }


                                                                                                                                                                                                ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>วันที่บรรจุ</h6>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative" id="date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input data-provide="datepicker" id="promotedate" name="promotedate" class="form-control" data-date-format="dd-mm-yyyy" id="date" placeholder="Select date" type="text" value="<?php


                                                                                                                                                                                                        $bd = $row["users_promote_date"];

                                                                                                                                                                                                        if ($bd == "0000-00-00") {
                                                                                                                                                                                                            echo "ไม่มีข้อมูล";
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            $timestamp = strtotime($bd);
                                                                                                                                                                                                            $new_date = date("d-m-Y", $timestamp);
                                                                                                                                                                                                            echo $new_date;
                                                                                                                                                                                                        }


                                                                                                                                                                                                        ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>







            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="submit" id="btn_submit_users_details" onsubmit="return validateForm()" class="btn btn-primary">บันทึกข้อมูล</button>
            </div>
            </form>

        </div>
    </div>
</div>


<script>
    $('#btn_submit_users_details').on('click', function(e) {

        e.preventDefault();
        var form1 = new FormData( $('#myForm')[0] );
    
    
        swal.fire({

            title: "ยืนยันการทำงานของท่าน?",
            text: "ตรวจสอบให้แน่ใจ การกระทำนี้ไม่สามารถยกเลิกได้!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3d9908",
            confirmButtonText: "ยืนยัน",
            showLoaderOnConfirm: true,
            preConfirm: () => {

$.ajax({
    url: 'controller/users_details_modal_save.php',
    type: "post",
    data: form1,
    cache: false,
    processData:false,
    contentType: false,
    success: function(dataResult) {
        var dataResult = JSON.parse(dataResult);
        console.log(dataResult);

        if (dataResult.statusCode == 200) {
            console.log("200");

            Swal.fire(
                'สำเร็จ',
                'ทำการอัพเดทข้อมูลเสร็จสิ้น',
                'success'
            ).then(() => {
                location.reload();
                console.log('reload');
            });

        } else if (dataResult.statusCode == 201) {
            console.log("201");
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'เกิดบางอย่างผิดพลาด',

                }).then(() => {
                location.reload();
                console.log('reload ');
            });
        }

    }

});
}
        });
    });

    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    
</script>