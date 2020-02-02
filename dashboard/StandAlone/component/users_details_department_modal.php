<!-- Modal -->
<div class="modal fade" id="departmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ตั้งค่าสถานะของพนักงาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controller/users_details_modal_department_update.php" id="form_department" method="POST">
                    <input type="hidden" class="form-control" name="users_id" value="<?php echo $row["users_id"]; ?>">
                    <div>แผนก</div>
                    <select id="sel_depart" name="department" class="form-control">
                        <option value="0 " disabled>- กรุณาเลือกแผนก -</option>
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
                    <div class="clear"></div>

                    <div>ฝ่าย </div>
                    <select id="sel_user" class="form-control" name="section">
                        <option value="0" disabled>- Select -</option>
                    </select>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="submit_department" onsubmit="return validateForm()" class="btn btn-primary">บันทึกข้อมูล</button>
            </div>

        </div>
    </div>

</div>
</form>


<script>
    $('#submit_department').on('click', function(e) {
        e.preventDefault();
        var form = $(this).parent('form_department');
        var users_id = $('#users_id').val();
        var sel_depart = $('#sel_depart').val();
        var sel_user = $('#sel_user').val();

        swal.fire({

            title: "ยันยันการเปลี่ยนฝ่ายและแผนกงาน?",
            text: "ตรวจสอบให้แน่ใจ การกระทำนี้ไม่สามารถยกเลิกได้!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5e72e4",
            confirmButtonText: "ยืนยัน",
            showLoaderOnConfirm: true,
            preConfirm: () => {

                $.ajax({
                    url: 'controller/users_details_modal_department_update.php',
                    type: "post",
                    data: $('#form_department').serialize(),
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        console.log(dataResult);

                        if (dataResult.statusCode == 200) {
                            console.log("200");

                            Swal.fire(
                                'สำเร็จ',
                                'ทำการปรับเปลี่ยนแผนกและฝ่ายสำเร็จ',
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
        })
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
</script>