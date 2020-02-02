<?php
require '../../sendMessage.php';
require '../../LINETypeMessage.php';
require '../../jsonfile.php';


date_default_timezone_set("Asia/Bangkok");
include("../../dashboard/StandAlone/config/dbconnect.php");

$pushmessage = 0;

if (isset($_POST['checkbox'])) {
    global $pushmessage;
    $pushmessage = 1;
} else {
    global $pushmessage;
    $pushmessage = 0;
}
$type = $_POST['type_post'];
$users_id = $_POST['users_id'];
$leave_paper_id = $_POST['leave_paper_id'];
$leave_paper_confirm_reason = $_POST['leave_paper_confirm_reason'];
$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName) or die("connecterror");
mysqli_set_charset($conn, "utf8");


$usersql = "SELECT users_uid,users_fname,users_lname,leave_paper_start_date , leave_paper_end_date FROM users 
LEFT JOIN leave_paper 
ON leave_paper.leave_paper_users_id = users.users_id
WHERE users_id = '$users_id' AND leave_paper_id = '$leave_paper_id'" ;
$usersquery = mysqli_query($conn, $usersql);
$row = $usersquery ->fetch_assoc();


$originalDate1 =  $row["leave_paper_start_date"];
$newDate1 = date("d-m-Y", strtotime($originalDate1));



$originalDate2 =  $row["leave_paper_end_date"];
$newDate2 = date("d-m-Y", strtotime($originalDate2));


if($type == '1'){
$sql = "UPDATE leave_paper SET 
leave_paper_confirm = '1' , -- 0 คือ เข้ามาเสนอ 1 คือ ไม่อนุมัติ 2 อนุมัติ
leave_paper_confirm_reason = '$leave_paper_confirm_reason' 
WHERE leave_paper_id = '$leave_paper_id' ";

$query = mysqli_query($conn, $sql);

}if($type == '2'){
    $sql = "UPDATE leave_paper SET 
leave_paper_confirm = '2' , -- 0 คือ เข้ามาเสนอ 1 คือ ไม่อนุมัติ 2 อนุมัติ
leave_paper_confirm_reason = '$leave_paper_confirm_reason' 
WHERE leave_paper_id = '$leave_paper_id' ";

$query = mysqli_query($conn, $sql);
}

if ($query) {
    global $pushmessage;

    if ($pushmessage == '1' && $type == '1') {
        
        $messages = [];
        $messages['to'] = $row["users_uid"];
        $messages['messages'][0] = [
            "type" => "flex",
            "altText" => "ผลการอนุมัติ",
            "contents" => [
              "type" => "bubble",
              "direction" => "ltr",
              "header" => [
                "type" => "box",
                "layout" => "vertical",
                "contents" => [
                  [
                    "type" => "text",
                    "text" => "NO." .$leave_paper_id." ",
                    "size" => "lg",
                    "align" => "start",
                    "weight" => "bold",
                    "color" => "#000000"
                  ],
                  [
                    "type" => "text",
                    "text" => "ไม่ได้รับอนุมัติ",
                    "size" => "3xl",
                    "weight" => "bold",
                    "color" => "#ff0000"
                  ],
                  [
                    "type" => "text",
                    "text" => "".$row["users_fname"]." ".$row["users_lname"]."",
                    "size" => "lg",
                    "weight" => "bold",
                    "color" => "#000000"
                  ],
                  [
                    "type" => "text",
                    "text" => " ".date("d-m-Y H:i:s")." ",
                    "size" => "xs",
                    "color" => "#B2B2B2"
                  ],
                  [
                    "type" => "text",
                    "text" => "หมายเหตุ :".$leave_paper_confirm_reason." ",
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
                        "text" => "วันที่เริ่มต้น",
                        "align" => "start",
                        "color" => "#C3C3C3"
                      ],
                      [
                        "type" => "text",
                        "text" => " ".$newDate1." ",
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
                        "text" => "วันที่สิ้นสุด",
                        "color" => "#C3C3C3"
                      ],
                      [
                        "type" => "text",
                        "text" => " ".$newDate2." ",
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
        $encodeJson = json_encode($messages);
        // echo $encodeJson;
        $datas['url'] = "https://api.line.me/v2/bot/message/push";
        $datas['token'] =  getTokenData();
        $results = sentMessage($encodeJson, $datas);

        if($results){
         
            echo 'ทำการส่งข้อความเรียบร้อย ท่านสามารถปิดหน้าต่างนี้ได้เลยคะ';
        }
    }if ($pushmessage == '1' && $type == '2') {
 
        $messages = [];
        $messages['to'] = $row["users_uid"];
        $messages['messages'][0] = [
            "type" => "flex",
            "altText" => "ผลการอนุมัติ",
            "contents" => [
              "type" => "bubble",
              "direction" => "ltr",
              "header" => [
                "type" => "box",
                "layout" => "vertical",
                "contents" => [
                  [
                    "type" => "text",
                    "text" => "NO." .$leave_paper_id." ",
                    "size" => "lg",
                    "align" => "start",
                    "weight" => "bold",
                    "color" => "#000000"
                  ],
                  [
                    "type" => "text",
                    "text" => "ได้รับอนุมัติ",
                    "size" => "3xl",
                    "weight" => "bold",
                    "color" => "#00ff00"
                  ],
                  [
                    "type" => "text",
                    "text" => "".$row["users_fname"]." ".$row["users_lname"]."",
                    "size" => "lg",
                    "weight" => "bold",
                    "color" => "#000000"
                  ],
                  [
                    "type" => "text",
                    "text" => " ".date("d-m-Y H:i:s")." ",
                    "size" => "xs",
                    "color" => "#B2B2B2"
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
                        "text" => "วันที่เริ่มต้น",
                        "align" => "start",
                        "color" => "#C3C3C3"
                      ],
                      [
                        "type" => "text",
                        "text" => " ".$newDate1." ",
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
                        "text" => "วันที่สิ้นสุด",
                        "color" => "#C3C3C3"
                      ],
                      [
                        "type" => "text",
                        "text" => " ".$newDate2." ",
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
        $encodeJson = json_encode($messages);
        // echo $encodeJson;
        $datas['url'] = "https://api.line.me/v2/bot/message/push";
        $datas['token'] =  getTokenData();
        $results = sentMessage($encodeJson, $datas);

        if($results){
         
            echo 'ทำการส่งข้อความเรียบร้อย ท่านสามารถปิดหน้าต่างนี้ได้เลยคะ';
        }
    }
    if ($pushmessage == '0') {
     echo "ทำการปรับในระบบเรียบร้อย";
    }
} else {
    echo "eror";
}

mysqli_close($conn);
