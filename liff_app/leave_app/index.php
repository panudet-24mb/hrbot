<!DOCTYPE html>

<html>

<head>


<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>ระบบลงทะเบียนผู้ใช้งาน</title>

<script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>

<script src="lib/jquery-3.3.1.min.js"></script>

<script src="lib/bootstrap.min.js"></script>

<link href="lib/bootstrap.min.css" rel="stylesheet" />




<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


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
  const picdisplay= profile.pictureUrl



  $('#displayName').val(profile.displayName);
  $('#pictureUrl').val(profile.pictureUrl);
  $('#statusMessage').val(profile.statusMessage);

})



}


//ready

$(function () {

//init LIFF

liff.init(function (data) {

initializeApp(data);

});

//ButtonGetProfile

$('#ButtonGetProfile').click(function () {

liff.getProfile().then(

profile=> {

$('#displayName').val(profile.displayName);

alert('done');

}

);

});

//ButtonSendMsg #QueryString

$('#ButtonSendMsg').click(function () {

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

</head>

<body>
<?php 

$leave_paper_category = $_GET["leave_paper_category"];

?>


    <form  action="save.php" method="get" class="login-form" id="myForm">

    <div class="login-page">
        <div class="form">
        
             <br>

            <p>แบบฟอร์มการลา</p> <?php  if ($leave_paper_category=='1') { echo '<p> ลาป่วย </p>'; }
                                     if ($leave_paper_category=='2') { echo '<p> ลากิจ </p>'; }
                                     if ($leave_paper_category=='3') { echo '<p> ลาประเภทอื่นๆ </p>'; }
            
            ?>
             <!-- //<input type="hidden" value="ลาป่วย" class="form-control"  name="leave_type"id="leave_type" disabled /> -->

             <!-- <div class="container">
              <div class="row"> -->
                <br>
                <div class="col-sm">
                  รูปแบบการลา :
                  
                </div>
                <br>
                <select class="form-control"  id="getFname" name="gethourleave" onchange="admSelectCheck(this);" required>
                    <option selected="selected"  disabled> 
                        ------กรุณาเลือก การลา------
                        </option>
                  <option id ="option9" value="9">ลาเต็มวัน</option>
                  <option id= "option5" value="5">ลาครึ่งวัน</option>
                  <option id="admOption"  value="0">ลาเป็นชั่วโมง</option>
                  </select>
                  <br>
                  <div id="admDivCheck" style="display:none;">
                    <br>
                    <input type="text" name ="getcounthour" class="form-control" placeholder="จำนวนชั่วโมง"   name="leave_hours_condition"id="leave_hours_condition"  />
                    <br>
                   </div> 
                  <input type="text"  placeholder="สาเหตุในการลา" class="form-control"  name="leave_reason"id="leave_reason" required="required" />
                   <P>วันที่ลา :</P>
                   <input type="text" name="datefilter" value="" readonly="readonly" placeholder="กรุณาเลือกวันที่"/>
                   
                  <!-- <input type="text" name="daterange"  /> -->

                  <input id="lat"  name="lat" type="hidden" required> 
                  <input id="long" name="long" type="hidden"  required> 
                  <input id="startdate" name="startdate1"  type="text" required > 
                  <input id="enddate" name="enddate1"  type="text"   required > 
                   
                  ลาทั้งหมด จำนวนวัน
                  <input id="showday"  name="showday" type="text" value ="" >
                  <input id="hoursleave" type="hidden">


                  <body onload='getLocation();'>

                <!-- test scipts -->
                
              <!-- test scipts -->
              <input class="form-control" type="hidden" id="userid" name="userid" />
              <input class="form-control" type="hidden" id="category" name="category"  value ="<?= $leave_paper_category?>"/>
         


            <br>



            <button type="submit"  id="btn_submit" onsubmit="return validateForm()" >ยืนแบบฟอร์มการลา</button>
            <p class="message">หากมีปัญหาในการใช้งานกรุณาติดต่อเจ้าหน้าที่</p>
          </form>
        </div>
      </div>












</body>
<style>
  .slidecontainer {
  width: 100%; /* Width of the outside container */
}

/* The slider itself */
.slider {
  -webkit-appearance: none;  /* Override default CSS styles */
  appearance: none;
  width: 100%; /* Full-width */
  height: 25px; /* Specified height */
  background: #d3d3d3; /* Grey background */
  outline: none; /* Remove outline */
  opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
  -webkit-transition: .2s; /* 0.2 seconds transition on hover */
  transition: opacity .2s;
}

/* Mouse-over effects */
.slider:hover {
  opacity: 1; /* Fully shown on mouse-over */
}

/* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */
.slider::-webkit-slider-thumb {
  -webkit-appearance: none; /* Override default look */
  appearance: none;
  width: 25px; /* Set a specific slider handle width */
  height: 25px; /* Slider handle height */
  background: #4CAF50; /* Green background */
  cursor: pointer; /* Cursor on hover */
}

.slider::-moz-range-thumb {
  width: 25px; /* Set a specific slider handle width */
  height: 25px; /* Slider handle height */
  background: #4CAF50; /* Green background */
  cursor: pointer; /* Cursor on hover */
}
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">
  $(function() {
  
    $('input[name="datefilter"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear',
            format: 'DD/MM/YYYY'
            
        }
    });
  
    $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
     
        c = 24*60*60*1000,
                   
                          diffDays1 = Math.round(Math.abs((picker.startDate - picker.endDate)/(c)));
                          document.getElementById('showday').value = diffDays1;
        document.getElementById('startdate').value = picker.startDate.format('YYYY-MM-DD');
        document.getElementById('enddate').value = picker.endDate.format('YYYY-MM-DD');
    });
  
    $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
  
  });
  </script>

<script>


$(function () {


                    $('input[name="daterange"]').daterangepicker({
               
                      
                    locale: {
                     format: 'DD/MM/YYYY'
                    }
                    
              
                    },
                
                    
                    function calculate(start, end, label,gethours) {
                   
                      console.log("A new date selection was made: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
                          //count days
                         c = 24*60*60*1000,
                          diffDays = Math.round(Math.abs((start - end)/(c))*(window.gethours));
                          diffDays1 = Math.round(Math.abs((start - end)/(c)));
                      console.log(diffDays); //show difference
                      document.getElementById('startdate').value = start.format('YYYY-MM-DD');
                      document.getElementById('enddate').value =  end.format('YYYY-MM-DD'); 
                      document.getElementById('showday').value = diffDays1;
                      document.getElementById('hoursleave').value = diffDays;
          
             
                     } );
                  });


   function admSelectCheck(nameSelect)
{
    if(nameSelect){
     
        admOptionValue = document.getElementById("admOption").value;
        option9 = document.getElementById("option9").value;
        option5 = document.getElementById("option5").value;
        
        if(admOptionValue == nameSelect.value){
            document.getElementById("admDivCheck").style.display = "block";
        }
        else{
            document.getElementById("admDivCheck").style.display = "none";
        }
    }
    else{
        document.getElementById("admDivCheck").style.display = "none";
    }if (option9 == nameSelect.value){

    

      window.gethours = 9;
    

    }if (option5 == nameSelect.value ){
      
               
      window.gethours = 5;
      document.getElementById("getFname").addEventListener("change", this.calculate);
      console.log ("Igot 5 select");
    }else {
      var gethours = 0;
    }
}

var x = document.getElementById("getlocation");

function getLocation()

      {
        
       navigator.geolocation.getCurrentPosition(function(position)
        {
         var coordinates = position.coords;
         document.getElementById('lat').value = coordinates.latitude;
         document.getElementById('long').value = coordinates.longitude;
       });
     }


function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}

function showhours() { 
            var x =  
                document.getElementById("hoursleave").value; 
            
            document.getElementById("hoursleave").innerHTML = x; 
        } 


 $('#btn_submit').on('click',function(e){
    e.preventDefault();
    var form = $(this).parent('myForm');
    swal.fire({
        title: "ยืนยันที่จะส่งฟอร์มการลา?",
        text: "ตรวจสอบให้แน่ใจ การกระทำนี้ไม่สามารถยกเลิกได้!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "confirm",
        showLoaderOnConfirm: true,
        preConfirm: function(isConfirm){
          if (!document.getElementById("leave_reason").value){
            alert('กรุณากรอกเหตุผลในการลา');
          } 
          else{
            document.forms["myForm"].submit();
          }
  
      
  
        }});
});


 </script>

</html>
