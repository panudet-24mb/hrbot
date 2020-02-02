<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        HR bot
    </title>

    <!-- <script src="https://static.line-scdn.net/liff/edge/2.1/liff.js"></script> -->
    <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>

    <script src="lib/jquery-3.3.1.min.js"></script>



    <script src="mobile-detect.js-master/mobile-detect.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>


    <script>
        //init LIFF





        //ready

        $(function() {





            liff.init(function(data) {

                initializeApp(data);


            });

            //ButtonGetProfile

            $('#ButtonGetProfile').click(function() {

                liff.getProfile().then(

                    profile => {

                        $('#displayName').val(profile.displayName);

                        alert('done');

                    }

                );

            });


            function initializeApp(data) {


                let urlParams = new URLSearchParams(window.location.search);

                $('#name').val(urlParams.toString());

                $('#userid').val(data.context.userId);


                let uid_var = data.context.userId;
                var users_uid = data.context.userId;

                document.cookie = "myUid = " + uid_var;


                // $('#statusMessage').val(data.context.statusMessage);

                liff.getProfile()
                    .then(profile => {
                        const name = profile.displayName
                        const statusMessage = profile.statusMessage
                        const picdisplay = profile.pictureUrl

                        $('#displayName').val(profile.displayName);
                        $('#pictureUrl').val(profile.pictureUrl);
                        $('#statusMessage').val(profile.statusMessage);

                        var inputVal = document.getElementById("pictureUrl").value;
                        document.getElementById("myImg").src = inputVal;



                    })



                $.ajax({
                    url: 'serverScript.php',
                    type: "post",
                    cache: false,
                    data: {

                        uid: users_uid

                    },
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        console.log(dataResult);


                        if (dataResult.statusCode == 200) {

                            document.getElementById("option_2").style.display = 'none';
                            // document.getElementById("option2").style.display='none';
                            // document.getElementById("option3").style.display='none';



                        } else if (dataResult.statusCode == 201) {
                            document.getElementById("option_1").style.display = 'none';
                        } else if (dataResult.statusCode == 202) {
                            console.log('202');
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'คุณยังไม่ได้สมัครสมาชิกหรือยังไม่ได้รับการยืนยันข้อมูลคะ'

                            }).then(function() {
                                liff.closeWindow();
                            })
                            //ไม่ได้เป็นพนักงาน
                        } else if (dataResult.statusCode == 203) {
                            console.log('203');
                            Swal.fire({
                                type: 'info',
                                title: 'Oops...',
                                text: 'คุณได้ทำการเข้างานแล้วในวันนี้ แล้วพบกันใหม่นะคะ'

                            }).then(function() {
                                liff.closeWindow();
                            })


                            //เข้างานไปแล้ววววว ----> link ไปอีกหน้าเลย
                        }else if (dataResult.statusCode == 204) {
                            console.log('203');
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'คุณถูกพักงานชั่วคราว'

                            }).then(function() {
                                liff.closeWindow();
                            })


                            //เข้างานไปแล้ววววว ----> link ไปอีกหน้าเลย
                        }else if (dataResult.statusCode == 205) {
                            console.log('203');
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'คุณไม่มีสถานะเป็นพนักงานหรือถูกยกเลิกบัญชีนี้'

                            }).then(function() {
                                liff.closeWindow();
                            })


                            //เข้างานไปแล้ววววว ----> link ไปอีกหน้าเลย
                        }


                    }
                });



            }

            //  $(document).ready(function() {


            //          $.ajax({
            //              type: 'post',
            //              data: {

            //                  uid: users_uid
            //              },
            //              success: function(response) {
            //                 console.log("200");
            //              }
            //          });

            //  });


            //ButtonSendMsg #QueryString

            $('#ButtonSendMsg').click(function() {

                liff.sendMessages([

                        {

                            type: 'text',

                            // text: $(‘#userid’).val() + $(‘#QueryString’).val() + $(‘#msg’).val()
                            text: $('คุณเคยลงทะเบียนแล้ว').val()

                        }

                    ])

                    .then(() => {

                        alert('done');

                    })

            });


        });
    </script>



    <link rel="icon" href="../../dashboard/StandAlone/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../../dashboard/StandAlone/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../../dashboard/StandAlone/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <script src="../../dashboard/StandAlone/assets/vendor/jquery/dist/jquery.min.js"></script>
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../../dashboard/StandAlone/assets/css/argon.css?v=1.1.0" type="text/css">

</head>


<style>
    h2 {
        margin: 30px 0 0 0;
    }

    fieldset {
        border: 0;
    }

    label {
        display: block;
    }

    /* select with custom icons */
    .ui-selectmenu-menu .ui-menu.customicons .ui-menu-item-wrapper {
        padding: 0.5em 0 0.5em 3em;
    }

    .ui-selectmenu-menu .ui-menu.customicons .ui-menu-item .ui-icon {
        height: 24px;
        width: 24px;
        top: 0.1em;
    }

    .ui-icon.video {
        background: url("images/24-video-square.png") 0 0 no-repeat;
    }

    .ui-icon.podcast {
        background: url("images/24-podcast-square.png") 0 0 no-repeat;
    }

    .ui-icon.rss {
        background: url("images/24-rss-square.png") 0 0 no-repeat;
    }

    /* select with CSS avatar icons */
    option.avatar {
        background-repeat: no-repeat !important;
        padding-left: 20px;
    }

    .avatar .ui-icon {
        background-position: left top;
    }

    .circular--square {
        border-radius: 50%;
    }

    /* css กำหนดความกว้าง ความสูงของแผนที่ */
    #map {
        height: 150px;
        width: 300px;
    }

    .switch-field {
        display: flex;
        margin-bottom: 36px;
        overflow: hidden;
    }
</style>

<body class="">


    <?php include("../../dashboard/StandAlone/config/dbconnect.php"); ?>




    <!-- Header -->
    <!--บน-->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">


    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <form action="save.php" method="get" class="login-form" id="myForm">


                            <div class="form">

                                <center>บันทึกการเข้างาน</center>
                                <center>
                                    <p id="time"></p>
                                </center>

                                <!-- <p> สวัสดีค่ะ คุณ <?php echo $row["users_fname"] . "    " . $row["users_lname"]; ?></p> -->


                                <div class="container-fluid">
                                    <!-- Control the column width, and how they should appear on different devices -->
                                    <div class="row">
                                        <div class="col-4"> <img id="myImg" src="" width="100" height="100" class="circular--square"></div> <br>
                                        <div class="col-8">

                                            <div class="form-group purple-border">

                                                <textarea name="status" class="form-control" placeholder="เขียนทักทายเพื่อนร่วมงาน หรือ เขียนอะไรที่นี่ ..." rows="3"></textarea>
                                            </div>

                                        </div>
                                    </div>





                                    <select name="type" class="form-control">
                                        <option value="1"> อยู่ออฟฟิศ</option>
                                        <option value="2"> ทำงานที่บ้าน</option>
                                        <option value="3"> ประชุมนอกสถานที่</option>
                                        <option value="4"> ออก siteงาน </option>
                                        <option value="5"> ทาน อาหาร</option>
                                        <option value="6"> อื่นๆ</option>
                                    </select>

                                    <br>
                                    <div class="container" id="option_1">
                                        <div class="row">
                                            <div class="col" data-toggle="buttons">

                                                <label class="btn btn-primary btn-lg btn-block active">
                                                    <input type="radio" name="category" id="option1" value="1" autocomplete="off" checked> เข้างาน
                                                </label>



                                            </div>
                                        </div>
                                    </div>

                                    <div class="container" id="option_2">
                                        <div class="row">
                                            <div class="col" data-toggle="buttons">


                                                <label class="btn btn-primary">
                                                    <input type="radio" name="category" id="option2" value="2" autocomplete="off"> ON SITE
                                                </label>
                                                <label class="btn btn-danger">
                                                    <input type="radio" name="category" id="option3" value="3" autocomplete="off"> ออกงาน
                                                </label>


                                            </div>
                                        </div>
                                    </div>



                                    <br>

                                    <div id="map"></div>

                                    <br>


                                    <input id="userid" name="userid" type="hidden">
                                    <input id="ip" name="ip" type="hidden">
                                    <input id="lat" name="lat" type="hidden">
                                    <input id="long" name="long" type="hidden">
                                    <input id="mobile" name="mobile" type="hidden">
                                    <input id="phone" name="phone" type="hidden">
                                    <input id="tablet" name="tablet" type="hidden">
                                    <input id="userAgent" name="userAgent" type="hidden">
                                    <input id="os" name="os" type="hidden">
                                    <input id="iPhone" name="iPhone" type="hidden">
                                    <input id="bot" name="bot" type="hidden">
                                    <input id="Webkit" name="Webkit" type="hidden">
                                    <input id="Build" name="Build" type="hidden">

                                    <body onload='getLocation();'>
                                        <!--     
        insert pic -->
                                        <input class="form-control" type="hidden" id="pictureUrl" name="pictureUrl" />


                                        <div class="row">
                                            <div class="col">

                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success btn-lg btn-block" id="btn_submit" onsubmit="return validateForm()">ยืนยัน</button>
                                            </div>
                                            <div class="col">

                                            </div>
                                        </div>
                                </div>






                                <br>
                                <p class="message" align="center">หากมีปัญหาในการใช้งานกรุณาติดต่อเจ้าหน้าที่</p>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>



    <!------end ----->
    <!-- Table -->







    <script>
        $.getJSON("https://api.ipify.org/?format=json", function(e) {
            console.log(e.ip);

            document.getElementById('ip').value = e.ip;
        });


        var md = new MobileDetect(window.navigator.userAgent);

        // more typically we would instantiate with 'window.navigator.userAgent'
        // as user-agent; this string literal is only for better understanding

        console.log(md.mobile()); // 'Sony'
        console.log(md.phone()); // 'Sony'
        console.log(md.tablet()); // null
        console.log(md.userAgent()); // 'Safari'
        console.log(md.os()); // 'AndroidOS'
        console.log(md.is('iPhone')); // false
        console.log(md.is('bot')); // false
        console.log(md.version('Webkit')); // 534.3
        console.log(md.versionStr('Build')); // '4.1.A.0.562'

        document.getElementById('mobile').value = md.mobile();
        document.getElementById('phone').value = md.phone();
        document.getElementById('tablet').value = md.tablet();
        document.getElementById('userAgent').value = md.userAgent();
        document.getElementById('os').value = md.os();
        document.getElementById('iPhone').value = md.is('iPhone');
        document.getElementById('bot').value = md.is('bot');
        document.getElementById('Webkit').value = md.version('Webkit');
        document.getElementById('Build').value = md.versionStr('Build');


        var timeDisplay = document.getElementById("time");


        function refreshTime() {
            var dateString = new Date().toLocaleString("th-TH");
            var formattedString = dateString.replace(", ", " - ");
            timeDisplay.innerHTML = formattedString;
        }

        setInterval(refreshTime, 10);


        function initMap() {
            var mapOptions = {
                center: {
                    lat: 13.847860,
                    lng: 100.604274
                },
                zoom: 17,
                draggable: false,
                disableDefaultUI: true,
                clickableIcons: false
            }

            var maps = new google.maps.Map(document.getElementById("map"), mapOptions);

            infoWindow = new google.maps.InfoWindow;

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {

                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    infoWindow.setPosition(pos);
                    infoWindow.setContent('คุณมาทำงานทีนี่  !. lat: ' + position.coords.latitude + ', lng: ' + position.coords.longitude + ' ');
                    infoWindow.open(maps);
                    map.setCenter(pos);
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }

        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }


        $(".toggle").change(function() {
            if ($(this).is(":checked")) {
                $('[id^="toggle"]').not(this).each(function() {
                    $(this).bootstrapToggle('off');
                });
            }
        });


        var x = document.getElementById("getlocation");

        function getLocation()

        {

            navigator.geolocation.getCurrentPosition(function(position) {
                var coordinates = position.coords;
                document.getElementById('lat').value = coordinates.latitude;
                document.getElementById('long').value = coordinates.longitude;
            });
        }


        function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude;
        }



        $('#btn_submit').on('click', function(e) {
            e.preventDefault();
            var form = $(this).parent('myForm');
            swal.fire({
                title: "ยืนยันการทำงานของท่าน?",
                text: "ตรวจสอบให้แน่ใจ การกระทำนี้ไม่สามารถยกเลิกได้!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3d9908",
                confirmButtonText: "confirm",
                showLoaderOnConfirm: true,
                preConfirm: function(isConfirm) {

                    document.forms["myForm"].submit();



                }
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/mobile-detect@1.4.4/mobile-detect.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALSzf_EiskJSQXKSkvGdA4CTwrZ-3MSEI&callback=initMap" async defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

</body>

</html>