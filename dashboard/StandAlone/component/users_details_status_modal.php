<!-- Modal -->
<div class="modal fade" id="statusmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ตั้งค่าสถานะของพนักงาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controller/users_details_modal_status_save.php" id="form2" method="post">
                    <input type="hidden" class="form-control" name="users_id" value="<?php echo $row["users_id"]; ?>">
                    <input type="hidden" class="form-control" name="status_emp" value="1">
                    <div class="container">

                        <div class="row">
                            <div class="col-4">
                                <input type="hidden" name="submit1" value="1" placeholder="text1" />
                                <input type="submit" class="btn btn-success" id="submitStatus1" name="btn1" value="เป็นพนักงาน">
                            </div>

                </form>
                <form action="controller/users_details_modal_status_save.php" id="form3" method="post">
                    <input type="hidden" class="form-control" name="users_id" value="<?php echo $row["users_id"]; ?>">
                    <input type="hidden" class="form-control" name="status_emp" value="2">
                    <div class="col-3">
                        <input type="hidden" name="submit2" value="2" placeholder="text2" />
                        <input type="submit" class="btn btn-info" id="submitStatus2" name="btn2" value="พักงาน">
                    </div>

                </form>
                <div class="col-4">
                    <form action="controller/users_details_modal_status_save.php" id="form4" method="post">
                        <input type="hidden" class="form-control" name="users_id" value="<?php echo $row["users_id"]; ?>">
                        <input type="hidden" class="form-control" name="status_emp" value="3">

                        <input type="hidden" name="submit3" value="3" placeholder="text3" />
                        <input type="submit" class="btn btn-danger" id="submitStatus3" name="btn3" value="สิ้นสุนการเป็นพนักงาน">
                </div>
            </div>
        </div>



        </form>
    </div>

</div>
</div>
</div>


<script>
    $('#submitStatus1').on('click', function(e) {
        e.preventDefault();
        var form = $(this).parent('form2');

        swal.fire({

            title: "ยันยันการให้พนักงานมีสถานะเป็นพนักงาน?",
            text: "ตรวจสอบให้แน่ใจ การกระทำนี้ไม่สามารถยกเลิกได้!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5e72e4",
            confirmButtonText: "ยืนยัน",
            showLoaderOnConfirm: true,
            preConfirm: () => {

                $.ajax({
                    url: 'controller/users_details_modal_status_save.php',
                    type: "post",
                    data: $('#form2').serialize(),
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
        });
    });

    $('#submitStatus2').on('click', function(e) {
        e.preventDefault();
        var form = $(this).parent('form2');
        swal.fire({

            title: "ยันยันการให้พนักงานมีสถานะเป็นพักงาน?",
            text: "ตรวจสอบให้แน่ใจ การกระทำนี้ไม่สามารถยกเลิกได้!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5e72e4",
            confirmButtonText: "ยืนยัน",
            showLoaderOnConfirm: true,
            preConfirm: () => {

                $.ajax({
                    url: 'controller/users_details_modal_status_save.php',
                    type: "post",
                    data: $('#form3').serialize(),
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
        });
    });


    $('#submitStatus3').on('click', function(e) {
        e.preventDefault();
        var form = $(this).parent('form2');
        swal.fire({

            title: "ยันยันการให้พนักงานมีสถานะหมดสถานะเป็นพนักงาน?",
            text: "ตรวจสอบให้แน่ใจ การกระทำนี้ไม่สามารถยกเลิกได้!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5e72e4",
            confirmButtonText: "ยืนยัน",
            showLoaderOnConfirm: true,
            preConfirm: () => {

                $.ajax({
                    url: 'controller/users_details_modal_status_save.php',
                    type: "post",
                    data: $('#form4').serialize(),
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
        });
    });
</script>