<style>
    .swal2-container {
        z-index: 10000;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="add_employee" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขรายละเอียดพนักงาน </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <form action="controller/users_add.php" id="myForm" method="post">

            <div class="modal-body">
            <br>
                                <br>    
            <div class="card-profile-image">
                                <img src="assets/img/brand/bot.png" id="preview" class="rounded-circle">
                </div>
                <br>    
                                <br>
                                <br>
            <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fileupload" name="fileupload" onchange="readURL(this);" lang="en">
                    <label class="custom-file-label" for="fileupload">อัพโหลดรูปภาพ
                  </div>
             
           
                  <br>
                                <br>
    
      
                    <div class="row">
                        <div class="col-md-2">
                            <h6>แผนก</h6>
                        </div>

                        <div class="col-md-10">
                            <select id="sel_depart" name="department" class="form-control">
                                <option value="0">- กรุณาเลือกแผนก -</option>
                                <?php
                                // Fetch Department
                                $sql_department = "SELECT * FROM department ";
                                $department_data = mysqli_query($conn, $sql_department);
                                while ($row = mysqli_fetch_assoc($department_data)) {
                                    $departid = $row['department_id'];
                                    $depart_name = $row['department_name'];

                                    // Option
                                    echo "<option value='" . $departid . "' >" . $depart_name . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="clear"></div>
                    <div class="row">
                        <div class="col-md-2">
                            <h6>ฝ่าย</h6>
                        </div>
                        <div class="col-md-10">
                            <select id="sel_user" class="form-control" name="section">
                                <option value="0">- Select -</option>
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>รหัสประชาชน</h6>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <input type="text" name="citizen_id" class="form-control" value="" />
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>ชื่อ และ นามสกุล</h6>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" name="fname" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" name="lname" class="form-control" value="" />
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
                                <input type="text" name="emp_id" class="form-control" value="" />
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
                                <input type="text" name="mobile" class="form-control" value="" />
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
                                <input type="text" name="address" class="form-control" value="" />
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
                                        <input name="bd" data-provide="datepicker" class="form-control" data-date-format="dd-mm-yyyy" id="date" placeholder="Select date" type="text" value="">
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

                            <select class="form-control" name="gender">
                                <option value="0" selected disabled hidden>

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
                                        <input data-provide="datepicker" name="startjob" class="form-control" data-date-format="dd-mm-yyyy" id="date" placeholder="Select date" type="text" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>









            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="submit" id="btn_submit" onsubmit="return validateForm()" class="btn btn-primary">บันทึกข้อมูล</button>
            </div>
            </form>

        </div>
    </div>
</div>





<script>
    $('#btn_submit').on('click', function(e) {

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
                    url: 'controller/users_add.php',
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
                                'ทำการเพื่มพนักงานเรียบร้อย',
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
                        } else if (dataResult.statusCode == 202) {
                            console.log("202");
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'คุณกรอกข้อมูลไม่ครบ',

                 
                            });
                        }

                    }

                });
            }
        });
    });


    $(document).ready(function() {

        $("#sel_depart").change(function() {
            var deptid = $(this).val();

            $.ajax({
                url: 'controller/users_details_modal_department_ajax.php',
                type: 'post',
                data: {
                    depart: deptid
                },
                dataType: 'json',
                success: function(response) {

                    var len = response.length;

                    $("#sel_user").empty();
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['section_id'];
                        var name = response[i]['section_name'];

                        $("#sel_user").append("<option value='" + id + "'>" + name + "</option>");

                    }
                }
            });
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