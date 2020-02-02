<?php
//DESC for collect all JSON OBJECT FILE ONLY 


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
            "text" => "Purchase",
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


  $testflex2 = 
    array (
        'type' => 'template',
        'altText' => 'กรุณาเช็คบนมือถือของท่าน',
        'template' => 
        array (
          'type' => 'carousel',
          'actions' => 
          array (
          ),
          'columns' => 
          array (
            0 => 
            array (
              'thumbnailImageUrl' => 'https://www.pnall.co.th/apps/line/hrbot/image/flexmenu/1.jpg',
              'title' => 'ลาป่วย',
              'text' => '   ',
              'actions' => 
              array (
                0 => 
                array (
                  'type' => 'uri',
                  'label' => 'ลาป่วย',
                  'uri' => 'line://app/1644777052-xE3EvBOa',
                ),
              ),
            ),
            1 => 
            array (
              'thumbnailImageUrl' => 'https://www.pnall.co.th/apps/line/hrbot/image/flexmenu/2.png',
              'title' => 'ลากิจส่วนตัว',
              'text' => '             ',
              'actions' => 
              array (
                0 => 
                array (
                  'type' => 'uri',
                  'label' => 'ลากิจ',
                  'uri' => 'line://app/1644777052-j4OLqzrx',
                ),
              ),
            ),
            2 => 
            array (
              'thumbnailImageUrl' => 'https://www.pnall.co.th/apps/line/hrbot/image/flexmenu/3.png',
              'title' => 'ลาประเภทอื่นๆ',
              'text' => ' ',
              'actions' => 
              array (
                0 => 
                array (
                  'type' => 'uri',
                  'label' => 'ลาประเภทอื่นๆ',
                  'uri' => 'line://app/1644777052-X4LmG059',
                ),
              ),
            ),
          ),
        ),
      );


      


  $testflex3 = 
  array (
      'type' => 'template',
      'altText' => 'กรุณาเช็คบนมือถือของท่าน',
      'template' => 
      array (
        'type' => 'carousel',
        'actions' => 
        array (
        ),
        'columns' => 
        array (
          0 => 
          array (
            'thumbnailImageUrl' => 'https://www.pnall.co.th/apps/line/hrbot/image/flexmenu/info.png',
            'title' => 'ข้อมูลส่วนตัว',
            'text' => 'ตรวจสอบรายละเอียดและข้อมูลส่วนตัวต่างๆ',
            'actions' => 
            array (
              0 => 
              array (
                'type' => 'uri',
                'label' => 'ตรวจสอบ',
                'uri' => 'line://app/1644777052-yvLp43Dm',
              ),
            ),
          ),
          1 => 
          array (
            'thumbnailImageUrl' => 'https://www.pnall.co.th/apps/line/hrbot/image/flexmenu/sick.jpg',
            'title' => 'ตรวจสอบสถานะการลา',
            'text' => 'เช็คว่า HR ของท่านได้อนุมัติการลาของท่านหรือไม่',
            'actions' => 
            array (
              0 => 
              array (
                'type' => 'uri',
                'label' => 'ตรวจสอบ',
                'uri' => 'line://app/1644777052-0B596WXL',
              ),
            ),
          ),
          2 => 
          array (
            'thumbnailImageUrl' => 'https://www.pnall.co.th/apps/line/hrbot/image/flexmenu/working-hard.jpg',
            'title' => 'ตรวจสอบเวลาการเข้างาน',
            'text' => 'ตรวจสอบเวลาการเข้างาน ขาดงาน มาสาย',
            'actions' => 
            array (
              0 => 
              array (
                'type' => 'uri',
                'label' => 'ตรวจสอบ',
                'uri' => 'line://app/1644777052-AnvR35Ey',
              ),
            ),
          ),
        ),
      ),
    );


    
$leave_json = [
  "type" => "flex",
  "altText" => "ส่งใบลา",
  "contents" => [
    "type" => "bubble",
    "direction" => "ltr",
    "header" => [
      "type" => "box",
      "layout" => "vertical",
      "contents" => [
        [
          "type" => "text",
          "text" => "ส่งใบลาสำเร็จ",
          "size" => "xs",
          "align" => "start",
          "weight" => "bold",
          "color" => "#009813"
        ],
       
        [
          "type" => "text",
          "text" => "กรุณารอการอนุมัติ ",
          "size" => "xs",
          "weight" => "bold",
          "color" => "#000000"
        ],
        
        [
          "type" => "text",
          "text" => "ผลการลาของท่าน",
          "margin" => "xs",
          "size" => "xs",
          "color" => "#000000"
        ],
        [
          "type" => "text",
          "text" => "เดี้ยวน้องพีจะแจ้งเตือนให้นะคะ",
          "margin" => "xs",
          "size" => "xs",
          "color" => "#000000"
        ]
      ]
    ]

  ]
];






  

?>