<?php include("middleware/middleware.php"); ?>
<?php include('config/css-headconfig.php'); ?>
<?php include("config/dbconnect.php"); ?>
<?php require_once("config/pagination.php"); ?>




<body>

    <?php include("component/mod_menu.php"); ?>



    <div class="header bg-gradient-primary pb-12 pt-8 pt-md-12"> </div>

    <div class="container-fluid  mt--7">
        <div class="header-body"></div>



   
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">

                            <div>หัวเรื่อง </div>
                            <input type="text" placeholder="หัวข้อ" name="pushmessage_subject" class="form-control" />
                            <br>
                            <div> เนื้อหา </div>
                            <textarea class="form-control form-control-alternative" name="pushmessage_msg" rows="3" placeholder="ข้อความที่ต้องการส่ง"></textarea>

                    </div>



                    <div class="modal-footer">

                        <button type="submit" id="submit_department" onsubmit="return validateForm()" class="btn btn-success">ส่งข้อความ</button>
                    </div>

                </div>
            </div>

        </div>
        </form>





    <?php include("component/mod_menu_footer.php"); ?>


    <?php include('config/scipts-config.php'); ?>
</body>

</html>