<style>
    .swal2-container {
        z-index: 10000;
    }
</style>

<!-- Modal -->

<?php
$users_id_users = $_GET['users_id'];

?>

<form action="users_time_emp_leave.php?users_id_users=<?= $users_id_users ?>" name="myForm_time_leave" method="post">
    <div class="modal fade" id="check_time_leave" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เลือกเดือนที่ต้องการตรวจสอบประวัติการลา </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <!-- <input id="mypicker2" name="moyear" class="form-control" data-date-format="dd-mm-yyyy" id="date" placeholder="เลือกเดือนที่ต้องการตรวจสอบ" type="text" value="" readonly> -->

                        </div>
                    </div>

                </div>

                <input name="users_id_users" class="form-control" type="hidden" value="<?= $users_id_users ?>">


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" id="btn_submit_leave" onsubmit="return validateForm()" class="btn btn-primary">ตรวจสอบ</button>
                </div>
</form>

</div>
</div>
</div>

   
<script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>

    $('#btn_submit_leave').on('click', function(e) {

        e.preventDefault();
        var form = $(this).parent('myForm_time_leave');
        swal.fire({

            title: "ยืนยันการทำงานของท่าน?",
            text: "ตรวจสอบให้แน่ใจ การกระทำนี้ไม่สามารถยกเลิกได้!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3d9908",
            confirmButtonText: "ยืนยัน",
            showLoaderOnConfirm: true,
            preConfirm: function(isConfirm) {

                document.forms["myForm_time_leave"].submit();



            }
        });
    });

    // $(function() {
    //     $("#mypicker2").datepicker({
    //         format: "yyyy-mm",
    //         viewMode: "months",
    //         minViewMode: "months"
    //     });
    // });


    
</script>

