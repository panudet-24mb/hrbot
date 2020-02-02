<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HR BOT</title>
    <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
    <script>
         //init LIFF
         

       
        
    liff.init(function (data) {
        liff.sendMessages([{
            type: 'text',
            text: "ตรวจสอบประวัติการเข้างาน"
        }])
        ,liff.closeWindow();

    });



     </script>
</head>
<body>
    



</body>
</html>