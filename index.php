<?php 
  /*
    LINE  Webhook v.1
  */

$serverName = "localhost";
$userName = "root";
$userPassword = "P@ssw0rd";
$dbName = "hrbot";
$connect=mysqli_connect($serverName,$userName,$userPassword,$dbName)or die("connecterror");

mysqli_set_charset($connect,"utf8");

    // check times
  date_default_timezone_set("Asia/Bangkok");
  $date = date("d-m-Y");
  $time = date("H:i:s");

  require 'sendMessage.php';
  require 'LINETypeMessage.php';
  require 'jsonfile.php';

  /*Get Data From POST Http Request*/
	$datas = file_get_contents('php://input');
  /*Decode Json From LINE Data Body*/
	$deCode = json_decode($datas,true);
  /*GET Reply Token*/
	$replyToken = $deCode['events'][0]['replyToken'];
  /*Message Type*/
  $messageType = $deCode['events'][0]['message']['type'];
  /*Check Mesage Text input */
  $messageText = $deCode['events'][0]['message']['text'];

  // การกำหนดการรับค่า users 
  $userID = $deCode['events'][0]['source']['userId'];

  include ('AiFace/init.php');

  $item = array();


    if($messageType == 'image'){
      $idmessage = $deCode['events'][0]['message']['id'];
      $results = getContent($idmessage); // ชื่อไฟล์  ---> $results
     
    
 

      $dataSendMessage['messages'][0] = getFormatTextMessage("ok ".$results);
      }
 
  
  else if($messageText == 'ขออนุมัติการลา'){
    //@ROUTE bot    
    //@DESC $testflex was in jsonfile.php objectfile
    //@access public
      $dataSendMessage['messages'][0] = $testflex2;
      $results = sentMessage($encodeJson,$dataSendMessage);

    
  }else if($messageText == 'ข้อมูลผู้ใช้งาน'){
    //@ROUTE bot    
    //@DESC $testflex was in jsonfile.php objectfile
    //@access public
      $dataSendMessage['messages'][0] = $testflex3;
      $results = sentMessage($encodeJson,$dataSendMessage);

    
  }else if ($messageText == 'x1'){
    //@ROUTE bot    
    //@DESC $testflex was in json objectfile
    //@access public
    $dataSendMessage['messages'][0] = 
    $testFlex = [
        "type" => "flex",
        "altText" => "Hello Flex Message",
        "contents" => [
          "type" => "bubble",
          "direction" => "ltr",
          "header" => [
            "type" => "box",
            "layout" => "vertical",
            "contents" => [
              [
                "type" => "text",
                "text" => "Purchase!!".$userID,
                "size" => "lg",
                "align" => "start",
                "weight" => "bold",
                "color" => "#009813"
              ],
              [
                "type" => "text",
                "text" => "฿ 99.00",
                "size" => "3xl",
                "weight" => "bold",
                "color" => "#000000"
              ],
              [
                "type" => "text",
                "text" => "Rabbit Line Pay",
                "size" => "lg",
                "weight" => "bold",
                "color" => "#000000"
              ],
              [
                "type" => "text",
                "text" => "2019.02.14 21:47 (GMT+0700)",
                "size" => "xs",
                "color" => "#B2B2B2"
              ],
              [
                "type" => "text",
                "text" => "Payment complete.",
                "margin" => "lg",
                "size" => "lg",
                "color" => "#000000"
              ]
            ]
          ],
          "body" => [
            "type" => "box",
            "layout" => "vertical",
            "contents" => [
              [
                "type" => "separator",
                "color" => "#C3C3C3"
              ],
              [
                "type" => "box",
                "layout" => "baseline",
                "margin" => "lg",
                "contents" => [
                  [
                    "type" => "text",
                    "text" => "Merchant",
                    "align" => "start",
                    "color" => "#C3C3C3"
                  ],
                  [
                    "type" => "text",
                    "text" => "BTS 01",
                    "align" => "end",
                    "color" => "#000000"
                  ]
                ]
              ],
              [
                "type" => "box",
                "layout" => "baseline",
                "margin" => "lg",
                "contents" => [
                  [
                    "type" => "text",
                    "text" => "New balance",
                    "color" => "#C3C3C3"
                  ],
                  [
                    "type" => "text",
                    "text" => "฿ 45.57",
                    "align" => "end"
                  ]
                ]
              ],
              [
                "type" => "separator",
                "margin" => "lg",
                "color" => "#C3C3C3"
              ]
            ]
          ],
          "footer" => [
            "type" => "box",
            "layout" => "horizontal",
            "contents" => [
              [
                "type" => "text",
                "text" => "View Details",
                "size" => "lg",
                "align" => "start",
                "color" => "#0084B6",
                "action" => [
                  "type" => "uri",
                  "label" => "View Details",
                  "uri" => "https://google.co.th/"
                ]
              ]
            ]
          ]
        ]
      ];
    $results = sentMessage($encodeJson,$dataSendMessage);

  }else if ($messageText =='ส่งใบลาสำเร็จ'){
    $dataSendMessage['messages'][0] = $leave_json;
    $results = sentMessage($encodeJson,$dataSendMessage);
     
    
  }else if ($messageText == 'ตรวจสอบประวัติการเข้างาน'){

    //ตรวจสอบว่าเป็นวันนี้
    $sql = "select checkin_id from checkin where checkin_users_uid='$userID' && checkin_date = CAST(CURRENT_TIMESTAMP AS DATE) group by checkin_id";
    $check = mysqli_query($connect,$sql);
    $count_row = mysqli_num_rows($check);
    if($count_row < 1){

      $dataSendMessage['messages'][0] = getFormatTextMessage("คุณยังไม่มีประวัติการเข้างานในวันนี้ครับ");

    }else{

    //ค้นหา เวลาเข้างาน
    $sql = "SELECT checkin_users_uid,checkin_emp_uid,checkin_date,checkin_time,users_fname,users_lname,users_department,users_section
    FROM checkin  
    LEFT JOIN users ON users.users_uid = checkin.checkin_users_uid
    WHERE  checkin_users_uid = '$userID'  && checkin_category = '1'  ORDER BY checkin_id DESC LIMIT 1";

    


    if ($result=mysqli_query($connect,$sql)){
      
          $department = "";
      while ($row=mysqli_fetch_row($result)){
        $checkin_users_uid = $row[0];
        $checkin_emp_uid = $row[1];
        $checkin_date = $row[2];
        $checkin_time = $row[3];
        $users_fname = $row[4];
        $users_lname = $row[5];
        $users_department = $row[6];
        $users_section = $row[7];
      }

      if($users_department == 0){
          $department = "IT";
      }else if($users_department == 1){
          $department = "HR";
      }


      $sql = "SELECT checkout_date , checkout_time,checkout_id FROM checkout WHERE  checkout_users_uid = '$userID' && checkout_date = CAST(CURRENT_TIMESTAMP AS DATE) && checkout_category = '3' ORDER BY checkout_id DESC";
      
      $result = $connect->query($sql);
      $row=mysqli_fetch_array($result,MYSQLI_NUM);

      if($row[0] == '' || $row[1] == '' ){
        $collect_user_date = "no data";
        $collect_user_time = "no data";
      }else{

      

      $collect_user_date = $row[0];
      $collect_user_time = $row[1];
  
    
      }

    $dataSendMessage['messages'][0] = 
    $testFlex = [
        "type" => "flex",
        "altText" => "ประวัติการทำงานของท่าน",
        "contents" => [
          "type" => "bubble",
          "direction" => "ltr",
          "header" => [
            "type" => "box",
            "layout" => "vertical",
            "contents" => [
              [
                "type" => "text",
                "text" => "รหัสพนักงาน  ".$checkin_emp_uid,
                "size" => "lg",
                "align" => "start",
                "weight" => "bold",
                "color" => "#009813"
              ],
             
              [
                "type" => "text",
                "text" => "ชื่อ " .$users_fname."   ".$users_lname,
                "size" => "lg",
                "weight" => "bold",
                "color" => "#000000"
              ],
              
              [
                "type" => "text",
                "text" => "  ".$date."  ".$time,
                "size" => "xs",
                "color" => "#B2B2B2"
              ],
              [
                "type" => "text",
                "text" => "ข้อมูลการทำงานของท่าน.",
                "margin" => "lg",
                "size" => "lg",
                "color" => "#000000"
              ]
            ]
              ],
          "body" => [
            "type" => "box",
            "layout" => "vertical",
            "contents" => [
              [
                "type" => "separator",
                "color" => "#C3C3C3"
              ],
              [
                "type" => "box",
                "layout" => "baseline",
                "margin" => "lg",
                "contents" => [
                  [
                    "type" => "text",
                    "text" => "".$checkin_date." เข้า",
                    "align" => "start",
                    "color" => "#C3C3C3"
                  ],
                  [
                    "type" => "text",
                    "text" => "".$checkin_time,
                    "align" => "end",
                    "color" => "#000000"
                  ]
                ]
              ],
              [
                "type" => "box",
                "layout" => "baseline",
                "margin" => "lg",
                "contents" => [
                  [
                    "type" => "text",
                    "text" => "".$collect_user_date ." ออก",
                    "color" => "#C3C3C3"
                  ],
                  
                  [
                    "type" => "text",
                    "text" => "".$collect_user_time,
                    "align" => "end"
                  ]
                ]
              ],
              [
                "type" => "separator",
                "margin" => "lg",
                "color" => "#C3C3C3"
              ]
            ]
          ]
        ]
      ];
    $results = sentMessage($encodeJson,$dataSendMessage);
       
  }

  }

}

  /*Function Write File LOG*/
	file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);

  /*Set Reply Token*/
	 $dataSendMessage['replyToken'] = $replyToken;


  /*Json Encode*/
	$encodeJson = json_encode($dataSendMessage);

  /*Set URL*/
  $functionals['url'] = "https://api.line.me/v2/bot/message/reply";
  $functionals['token'] = getTokenData();

  /*Function Send Message*/
	sentMessage($encodeJson,$functionals);
  /*Return HTTP Request 200*/
	http_response_code(200);
