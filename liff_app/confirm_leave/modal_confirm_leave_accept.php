<style>
    .swal2-container {
        z-index: 10000;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="acceptmodal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="badge badge-pill badge-success">อนุมัติ</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="modal_confirm_leave_save.php" id="myForm" method="post">
                    <input type="hidden" class="form-control" name="type_post" value="2"> 
                    <input type="hidden" class="form-control" name="users_id" value="<?php echo $row["users_id"]; ?>">
                    <input type="hidden" class="form-control" name="leave_paper_id" value="<?php echo $row["leave_paper_id"]; ?>">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6></h6>

                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                            <input type="hidden" class="form-control" name="leave_paper_confirm_reason">
                            </div>
                        </div>

                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-10">
                                <span>ต้องการส่งสถานะการอนุมัติไปยังพนักงานหรือไม่</span>
                            </div>
                            <div class="col-2">
                                <label class="custom-toggle">
                                    <input type="checkbox" name ="checkbox">
                                    <span class="custom-toggle-slider rounded-circle"></span>
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" id="btn_submit" onsubmit="return validateForm()" class="btn btn-primary">บันทึกข้อมูล</button>
                    </div>

            </div>

        </div>
    </div>





</div>



</form>

</div>
</div>
</div>

<script language="JavaScript" type="text/javascript" src="./assets/js/plugins/jquery/dist/jquery.min.js">
    $(document).off('.datepicker.data-api');
</script>

<script>
    $('#btn_submit').on('click', function(e) {

        e.preventDefault();
        var form = $(this).parent('myForm');
        swal.fire({

            title: "ยืนยันการทำงานของท่าน?",
            text: "ตรวจสอบให้แน่ใจ การกระทำนี้ไม่สามารถยกเลิกได้!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3d9908",
            confirmButtonText: "ยืนยัน",
            showLoaderOnConfirm: true,
            preConfirm: function(isConfirm) {

                document.forms["myForm"].submit();



            }
        });
    });
</script>