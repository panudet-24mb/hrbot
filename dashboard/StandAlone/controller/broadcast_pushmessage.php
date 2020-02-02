<?php
require '../../../sendMessage.php';
require '../../../LINETypeMessage.php';
require '../../../jsonfile.php';


date_default_timezone_set("Asia/Bangkok");
include("../../../dashboard/StandAlone/config/dbconnect.php");

$department = $_POST["department"];
$section = $_POST["section"];
$pushmessage_subject = $_POST["pushmessage_subject"];
$pushmessage_msg = $_POST["pushmessage_msg"];

echo ($section);

$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName) or die("connecterror");
mysqli_set_charset($conn, "utf8");
$messages = [];
$resultArray = array();
if ($section == '99') {
  $sql = "SELECT users_uid FROM users where users_department = '$department' ";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $users_uid = $row['users_uid'];
    array_push($resultArray, $users_uid);
  }
}
if ($department == '99') {
  $sql = "SELECT users_uid FROM users where users_active != '2' ";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $users_uid = $row['users_uid'];
    array_push($resultArray, $users_uid);
  }
} else {

  $sql = "SELECT users_uid FROM users where users_section = '$section' ";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result)) {
    $users_uid = $row['users_uid'];
    array_push($resultArray, $users_uid);
  }
}

print_r($resultArray);
//  echo '<br>';
//  echo '<br>';
//  echo '<br>';
//  echo '<br>';

//  echo json_encode($resultArray);


$usersql = "INSERT INTO pushmessage  (pushmessage_subject,pushmessage_msg,pushmessage_created) VALUE ('$pushmessage_subject','$pushmessage_msg',NOW())";
$usersquery = mysqli_query($conn, $usersql);


if ($usersquery) {



  // $messages['to'] = ['U48b33a17fef7cd19edee238beb4d8c59'];
  $messages['to'] = $row["users_uid"];
  $messages['messages'][0] = [
    "type" => "flex",
    "altText" => "ข้อความจาก HR",
    "contents" => [
      "type" => "bubble",
      "direction" => "ltr",
      "header" => [
        "type" => "box",
        "layout" => "vertical",
        "contents" => [
          [
            "type" => "text",
            "text" => " " . $pushmessage_subject . " ",
            "color"=> "#2AA030",
            "align" => "start",

          ],

          [
            "type" => "text",
            "text" => " " . date("d-m-Y H:i:s") . " ",
            "size" => "xs",
            "color" => "#B2B2B2"
          ]
          // [
          //   "type" => "text",
          //   "text" => " ".$pushmessage_msg." ",
          //   "margin" => "lg",
          //   "size" => "lg",
          //   "color" => "#000000"

          // ]
        ]
      ],
      "body" => [
        "type" => "box",
        "layout" => "vertical",
        "contents" => [
          [

            "type" => "text",
            "text" => " " . $pushmessage_msg . " ",
            "align" => "start",
            "wrap" => true
          ],  
         

        ]
      ],

      "footer" => [
        "type" => "box",
        "layout" => "horizontal",
        "contents" => [



          [
            "type" => "box",
            "layout" => "baseline",
            "margin" => "lg",
            "contents" => [
              [
                "type" => "text",
                "text" => "HRBOT",
                "color" => "#C3C3C3"
              ],
              [
                "type" => "text",
                "text" => "PN ALL CO.,LTD",
                "align" => "end"
              ]
            ]
          ],
         
        ]
      ]
    ]
  ];
  $encodeJson = json_encode($messages);

  // echo $encodeJson;
  $datas['url'] = "https://api.line.me/v2/bot/message/multicast";
  $datas['token'] =  getTokenData();

  $results = sentMessage($encodeJson, $datas);


  print_r($results);
  print_r($messages['to']);
} else {
  echo json_encode(array("statusCode" => 201));
}

mysqli_close($conn);


// [
//   "type" => "separator",
//   "color" => "#C3C3C3"
// ],

// [
//   "type" => "box",
//   "layout" => "baseline",
//   "margin" => "lg",
//   "contents" => [
//     [
//       "type" => "text",
//       "text" => "HRBOT",
//       "color" => "#C3C3C3"
//     ],
//     [
//       "type" => "text",
//       "text" => "PN ALL CO.,LTD",
//       "align" => "end"
//     ]
//   ]
// ],
// [
//   "type" => "separator",
//   "margin" => "lg",
//   "color" => "#C3C3C3"
// ]
