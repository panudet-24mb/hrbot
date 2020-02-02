<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        HR bot
    </title>


    <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
    <script src="lib/jquery-3.3.1.min.js"></script>





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
    <link rel="stylesheet" href="pickadate.js-3.6.2/lib/themes/default.date.css" type="text/css">
    <script src="../../dashboard/StandAlone/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="pickadate.js-3.6.2/lib/picker.js"></script>
    <script src="pickadate.js-3.6.2/lib/legacy.js"></script>
    <script src="pickadate.js-3.6.2/lib/picker.date.js"></script>
    <script src="pickadate.js-3.6.2/lib/picker.time.js"></script>
</head>
<style>
    /**
 * Housekeeping
 */
    body {
        /* font-family: sans-serif;
        font-weight: 200;
        font-size: 18px;
        line-height: 1.5;
        max-width: 540px;
        margin: 0 auto;
        padding: 2em 0; */
    }

    fieldset {
        margin: 1em 0;
        border: 0;
        padding: 0;
        position: relative;
    }

    input {
        font-size: 1em;
        font-family: sans-serif;
        font-weight: 200;
        border: 2px solid #999;
        padding: .75em 1em;
        display: block;
        width: 100%;
        box-sizing: border-box;
        margin: 0;
    }

    input:focus {
        border-color: #0089ec;
    }

    a {
        color: #0089ec;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .whitespace:before {
        content: "...some content here...";
        color: #ccc;
        background: #f5f5f5;
        margin: 1em 0;
        padding: 5em 0;
        font-weight: bold;
        font-size: 1.5em;
        letter-spacing: 2px;
        text-align: center;
        display: block;
        text-transform: uppercase;
    }





    .picker {
        font-size: 16px;
        text-align: left;
        line-height: 1.2;
        color: #000;
        position: absolute;
        z-index: 10000
    }

    .picker__input.picker__input--active {
        border-color: #0089ec
    }

    .picker__holder {
        width: 100%;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch
    }

    .picker {
        width: 100%
    }

    .picker__holder {
        position: absolute;
        background: #fff;
        border: 1px solid #aaa;
        border-top: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        min-width: 176px;
        max-width: 466px;
        -webkit-border-radius: 0 0 6px 6px;
        -moz-border-radius: 0 0 6px 6px;
        border-radius: 0 0 6px 6px;
        max-height: 0;
        -ms-filter: "alpha(Opacity=0)";
        filter: alpha(opacity=0);
        -moz-opacity: 0;
        opacity: 0;
        -webkit-transform: translateY(-1em) perspective(600px) rotateX(10deg);
        -moz-transform: translateY(-1em) perspective(600px) rotateX(10deg);
        transform: translateY(-1em) perspective(600px) rotateX(10deg);
        -webkit-transition: all .15s ease-out, max-height 0 .15s;
        -moz-transition: all .15s ease-out, max-height 0 .15s;
        transition: all .15s ease-out, max-height 0 .15s
    }

    .picker--opened .picker__holder {
        max-height: 25em;
        -ms-filter: "alpha(Opacity=100)";
        filter: alpha(opacity=100);
        -moz-opacity: 1;
        opacity: 1;
        -webkit-transform: translateY(0) perspective(600px) rotateX(0);
        -moz-transform: translateY(0) perspective(600px) rotateX(0);
        transform: translateY(0) perspective(600px) rotateX(0);
        -webkit-transition: all .15s ease-out, max-height 0;
        -moz-transition: all .15s ease-out, max-height 0;
        transition: all .15s ease-out, max-height 0;
        -webkit-box-shadow: 0 6px 18px 1px rgba(0, 0, 0, .12);
        -moz-box-shadow: 0 6px 18px 1px rgba(0, 0, 0, .12);
        box-shadow: 0 6px 18px 1px rgba(0, 0, 0, .12)
    }



    .picker__box {
        padding: 0 1em
    }

    .picker__header {
        text-align: center;
        position: relative;
        margin-top: .75em
    }

    .picker__month,
    .picker__year {
        font-weight: 500;
        display: inline-block;
        margin-left: .25em;
        margin-right: .25em
    }

    .picker__year {
        color: #999;
        font-size: .8em;
        font-style: italic
    }

    .picker__select--month,
    .picker__select--year {
        font-size: .8em;
        border: 1px solid #b7b7b7;
        height: 2.5em;
        padding: .66em .25em;
        margin-left: .25em;
        margin-right: .25em;
        margin-top: -.5em
    }

    .picker__select--month {
        width: 35%
    }

    .picker__select--year {
        width: 22.5%
    }

    .picker__select--month:focus,
    .picker__select--year:focus {
        border-color: #0089ec
    }

    .picker__nav--prev,
    .picker__nav--next {
        position: absolute;
        top: -.33em;
        padding: .5em 1.33em;
        width: 1em;
        height: 1em
    }

    .picker__nav--prev {
        left: -1em;
        padding-right: 1.5em
    }

    .picker__nav--next {
        right: -1em;
        padding-left: 1.5em
    }

    .picker__nav--prev:before,
    .picker__nav--next:before {
        content: " ";
        border-top: .5em solid transparent;
        border-bottom: .5em solid transparent;
        border-right: .75em solid #000;
        width: 0;
        height: 0;
        display: block;
        margin: 0 auto
    }

    .picker__nav--next:before {
        border-right: 0;
        border-left: .75em solid #000
    }

    .picker__nav--prev:hover,
    .picker__nav--next:hover {
        cursor: pointer;
        color: #000;
        background: #b1dcfb
    }

    .picker__nav--disabled,
    .picker__nav--disabled:hover,
    .picker__nav--disabled:before,
    .picker__nav--disabled:before:hover {
        cursor: default;
        background: 0;
        border-right-color: whitesmoke;
        border-left-color: whitesmoke
    }

    .picker__table {
        text-align: center;
        border-collapse: collapse;
        border-spacing: 0;
        table-layout: fixed;
        font-size: inherit;
        width: 100%;
        margin-top: .75em;
        margin-bottom: .5em
    }

    @media (min-height:26.5em) {
        .picker__table {
            margin-bottom: .75em
        }
    }

    .picker__table td {
        margin: 0;
        padding: 0
    }

    .picker__weekday {
        width: 14.285714286%;
        font-size: .75em;
        padding-bottom: .25em;
        color: #999;
        font-weight: 500
    }

    @media (min-height:26.5em) {
        .picker__weekday {
            padding-bottom: .5em
        }
    }

    .picker__day {
        padding: .3125em 0;
        font-weight: 200;
        border: 1px solid transparent
    }

    .picker__day--today {
        color: #0089ec;
        position: relative
    }

    .picker__day--today:before {
        content: " ";
        position: absolute;
        top: 2px;
        right: 2px;
        width: 0;
        height: 0;
        border-top: .5em solid #0059bc;
        border-left: .5em solid transparent
    }

    .picker__day--selected,
    .picker__day--selected:hover {
        border-color: #0089ec
    }

    .picker__day--highlighted {
        background: #b1dcfb
    }

    .picker__day--disabled:before {
        border-top-color: #aaa
    }

    .picker__day--outfocus {
        color: #ddd;
        -ms-filter: "alpha(Opacity=66)";
        filter: alpha(opacity=66);
        -moz-opacity: .66;
        opacity: .66
    }

    .picker__day--infocus:hover,
    .picker__day--outfocus:hover {
        cursor: pointer;
        color: #000;
        background: #b1dcfb
    }

    .picker__day--highlighted:hover,
    .picker--focused .picker__day--highlighted {
        background: #0089ec;
        color: #fff
    }

    .picker__day--disabled,
    .picker__day--disabled:hover {
        background: whitesmoke;
        border-color: whitesmoke;
        color: #ddd;
        cursor: default
    }

    .picker__footer {
        text-align: center
    }

    .picker__button--today,
    .picker__button--clear {
        border: 1px solid #fff;
        background: #fff;
        font-size: .8em;
        padding: .66em 0;
        font-weight: 700;
        width: 50%;
        display: inline-block;
        vertical-align: bottom
    }

    .picker__button--today:hover,
    .picker__button--clear:hover {
        cursor: pointer;
        color: #000;
        background: #b1dcfb;
        border-bottom-color: #b1dcfb
    }

    .picker__button--today:focus,
    .picker__button--clear:focus {
        background: #b1dcfb;
        border-color: #0089ec;
        outline: 0
    }

    .picker__button--today:before,
    .picker__button--clear:before {
        position: relative;
        display: inline-block;
        height: 0
    }

    .picker__button--today:before {
        content: " ";
        margin-right: .45em;
        top: -.05em;
        width: 0;
        border-top: .66em solid #0059bc;
        border-left: .66em solid transparent
    }

    .picker__button--clear:before {
        content: "\D7";
        margin-right: .35em;
        top: -.1em;
        color: #e20;
        vertical-align: top;
        font-size: 1.1em
    }
</style>

<script>
    //init LIFF

    function initializeApp(data) {

        let urlParams = new URLSearchParams(window.location.search);

        $('#name').val(urlParams.toString());

        $('#userid').val(data.context.userId);

        // $('#statusMessage').val(data.context.statusMessage);

        liff.getProfile()
            .then(profile => {
                const name = profile.displayName
                const statusMessage = profile.statusMessage
                const picdisplay = profile.pictureUrl



                $('#displayName').val(profile.displayName);
                $('#pictureUrl').val(profile.pictureUrl);
                $('#statusMessage').val(profile.statusMessage);

            })



    }


    //ready

    $(function() {

        //init LIFF

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


    function admSelectCheck(nameSelect) {
        if (nameSelect) {

            admOptionValue = document.getElementById("admOption").value;
            option9 = document.getElementById("option9").value;
            option5 = document.getElementById("option5").value;

            if (admOptionValue == nameSelect.value) {
                document.getElementById("admDivCheck").style.display = "block";
            } else {
                document.getElementById("admDivCheck").style.display = "none";
            }
        } else {
            document.getElementById("admDivCheck").style.display = "none";
        }
        if (option9 == nameSelect.value) {



            window.gethours = 9;


        }
        if (option5 == nameSelect.value) {


            window.gethours = 5;
            document.getElementById("getFname").addEventListener("change", this.calculate);
            console.log("Igot 5 select");
        } else {
            var gethours = 0;
        }
    }
</script>



<body class="">
    <?php include("../../dashboard/StandAlone/config/dbconnect.php"); ?>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">


    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <form action="save.php" method="POST" id="myForm">
                            <div class="form-group">
                                <label for="form-con1">กรุณาเลือกประเภทการลา</label>
                                <select class="form-control" id="select1" name="category">
                                    <option value="1">ลาป่วย</option>
                                    <option value="2">ลากิจ</option>
                                    <option value="3">ลาพักร้อน</option>
                                    <option value="4">ลาคลอด</option>
                                    <option value="5">ลาประกอบพิธีทางศาสนา</option>
                                    <option value="6">ลาประเภทอื่นๆ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="form-con2">รูปแบบการลา</label>
                                <select class="form-control" id="getFname" name="gethourleave" onchange="admSelectCheck(this);" required>
                                    <option selected="selected" disabled>
                                        กรุณาเลือก การลา
                                    </option>
                                    <option id="option9" value="1">ลาเต็มวัน</option>
                                    <option id="option5" value="2">ลาครึ่งวัน</option>
                                    <option id="admOption" value="3">ลาเป็นชั่วโมง</option>
                                </select>
                  
                                <div id="admDivCheck" style="display:none;">

                                    <input type="tel" name="getcounthour" class="form-control" placeholder="จำนวนชั่วโมง" name="leave_hours_condition" id="leave_hours_condition" />

                                </div>
                            </div>

                            <div class="form-group">
                            <label for="form-con2">เหตุผลในการลางานของท่าน</label>
                            <input type="text" class="form-control" id="leave_reason" name="leave_reason" placeholder="เหตุผลในการลา" value="">

                            </div>
                            <div class="form-group">


                                <fieldset>
                                    <label for="form-con2">วันที่เริ่มต้น</label>
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control" type="text" id="input_from" name="input_from" placeholder="วันที่เริ่มต้น">
                                    </div>

                                </fieldset>



                                <fieldset>
                                    <label for="form-con2">วันที่สิ้นสุด</label>
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control" type="text" id="input_to" name="input_to" placeholder="วันที่สิ้นสุด">
                                    </div>

                                </fieldset>
                                <br>


                            </div>

                            <body onload='getLocation();'>

                                <input id="lat" name="lat" type="hidden" required>
                                <input id="long" name="long" type="hidden" required>
                                <input class="form-control" type="hidden" id="userid" name="userid" />

                                <div class="text-center">
                                    <button type="submit" id="btn_submit" class="btn btn-success">
                                        <span class="far fa-check-circle"></span> ยืนยัน
                                    </button>
                                </div>


                    </div>
                </div>
            </div>
        </div>
    </div>



    </form>


    <script>
        $(document).ready(function() {
            var from_$input = $('#input_from').pickadate({
                    monthsFull: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
                    weekdaysShort: ['จันทร์', 'อังคาร', 'พุธ', 'พฏหัส', 'ศุกร์', 'เสาร์', 'อาทิตย์'],
                    today: 'ลาวันนี้',
                    clear: 'เครียร์ค่า',
                    formatSubmit: 'yyyy/mm/dd',
                    hiddenName: true
                }),
                from_picker = from_$input.pickadate('picker')



            var to_$input = $('#input_to').pickadate({
                    monthsFull: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
                    weekdaysShort: ['จันทร์', 'อังคาร', 'พุธ', 'พฏหัส', 'ศุกร์', 'เสาร์', 'อาทิตย์'],
                    today: 'ลาวันนี้',
                    clear: 'เครียร์ค่า',
                    formatSubmit: 'yyyy/mm/dd',
                    hiddenName: true

                }),
                to_picker = to_$input.pickadate('picker')


            // Check if there’s a “from” or “to” date to start with.
            if (from_picker.get('value')) {
                to_picker.set('min', from_picker.get('select'))

            }
            if (to_picker.get('value')) {
                from_picker.set('max', to_picker.get('select'))
            }

            // When something is selected, update the “from” and “to” limits.
            from_picker.on('set', function(event) {
                if (event.select) {
                    to_picker.set('min', from_picker.get('select'))
                } else if ('clear' in event) {
                    to_picker.set('min', false)
                }
            })
            to_picker.on('set', function(event) {
                if (event.select) {
                    from_picker.set('max', to_picker.get('select'))
                } else if ('clear' in event) {
                    from_picker.set('max', false)
                }
            })
        });





        $('#btn_submit').on('click', function(e) {


            var form = $(this).parent('myForm');
            e.preventDefault();
            swal.fire({
                title: "ยืนยันที่จะส่งฟอร์มการลา?",
                text: "ตรวจสอบให้แน่ใจ การกระทำนี้ไม่สามารถยกเลิกได้!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "confirm",
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.value) {
                    if (!document.getElementById("leave_reason").value || !document.getElementById("input_to").value || !document.getElementById("input_from").value) {
                        Swal.fire({

                            type: 'error',
                            title: 'Oops...',
                            text: 'คุณยังไม่ได้กรอกเหตุผล หรือ ยังไม่ได้ระบุวันที่จะทำการลา',


                        })
                    } else if (document.getElementById("admOption").selected == true) {

                        if (document.getElementById("leave_hours_condition").value <= 1 || document.getElementById("leave_hours_condition").value >= 6) {
                            Swal.fire({

                                type: 'error',
                                title: 'โปรดตรวจสอบ',
                                text: 'การลาเป็นชั่วโมงจะทำการลาได้มากกว่าหรือเท่ากับ 2 ชั่วโมงและ และ น้อยกว่าหรือเท่ากับ 5 คะ',


                            })

                        } else {
                            Swal.fire({

                                type: 'success',
                                title: 'สำเร็จ!',
                                text: 'ทำการส่งข้อมูลไปยังหน่วยงานของท่านกรุณารอการอนุมัติคะ',


                            }).then((result) => {
                                document.forms["myForm"].submit();
                                console.log('200');
                            })


                        }

                    } else {

                        Swal.fire({

                            type: 'success',
                            title: 'สำเร็จ!',
                            text: 'ทำการส่งข้อมูลไปยังหน่วยงานของท่านกรุณารอการอนุมัติคะ',


                        }).then((result) => {
                            document.forms["myForm"].submit();
                            console.log('200');
                        })

                    }
                }
            });
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
    </script>



</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>



</html>