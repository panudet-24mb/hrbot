<?php
function uppic_only($img,$imglocate,$multi=false,$limit_size=2000000,$limit_width=false,$limit_height=false){
    $allowed_types=array("jpg","jpeg","gif","png");   // กำหนดนามสกุลของไฟล์ที่อนุญาตให้อัพโหลด 
    $file_up=NULL; // กำหนดชื่อไฟล์เริ่มต้น เป็น NULL
    $i_num = (isset($multi))?count($img['name']):false; // ตรวจสอบว่ามีการอัพทีละหลายๆ ไฟล์หรือไม่
    if($img["name"]!="" || @implode("",$img["name"])!=""){ // มีการส่งไฟล์เข้ามาจริง
        if($i_num){
            $file_up = array();
            for($i=0;$i<$i_num;$i++){     // วนลูปกรณีอัพที่ละหลายไฟล์           
                $fileupload1=$img["tmp_name"][$i]; // ข้อมูลไฟล์อัพโหลด
                $data_Img=@getimagesize($fileupload1); // หาความกว้าง ความสูงของรูป
                $g_img=explode(".",$img["name"][$i]); // แยกข้อมูลจากชื่อไฟล์ เพื่อหา ชื่อไฟล์ นามสกุลไฟล์
                $ext = strtolower(array_pop($g_img));  // แยกนามกุลไฟล์ออกมา แล้วปรับให้เป็นตัวพิมพ์เล็ก
                $file_up_arr=time()."-".$i.".".$ext;  // กำหนดชื่อไฟล์ใหม่ ในที่นี้จะเป็นในรูปแบบ เช่น 1234556789-1.jpg                     
                $canUpload=0; // กำหนดสถานะอัพโหลดเริ่มต้น
                if(isset($data_Img) && $data_Img[0]>0 && $data_Img[1]>0){ // ตรวงสอบว่ามีข้อมูลเกี่ยวกับรูปหรือไม่ เช่น ความกว้าง สูง
                    if($img["size"][$i]<=$limit_size){   // ขนาดของรูปที่อัพโหลด จะต้องไม่เกิน ค่าที่กำหนด           
                        if($limit_width && $limit_height){ // ถ้ามีการกำหนดให้ตรวจสอบ ขนาดความกว้างและสูง ของรูป
                            if($data_Img[0]<=$limit_width && $data_Img[1]<=$limit_height){
                                $canUpload=1;
                            }                   
                        }elseif($limit_width>0 && $limit_height==false){// ถ้ามีการกำหนดให้ตรวจสอบ เฉพาะขนาดความกว้าง ของรูป
                            if($data_Img[0]<=$limit_width){
                                $canUpload=1;
                            }       
                        }elseif($limit_width==false && $limit_height>0){// ถ้ามีการกำหนดให้ตรวจสอบ เฉพาะขนาดความสูง ของรูป
                            if($data_Img[1]<=$limit_height){
                                $canUpload=1;
                            }                                               
                        }else{ // ไม่มีการรวจสอบเพิ่มเติมใดๆ นอกจากขนาดไฟล์
                            $canUpload=1;                   
                        }           
                    }          
                }  
                // เมื่อมีข้อมูลไฟล์ที่อัพโหลด และเป็นไฟล์ที่อนุญาต และสามารถอัพโหลดได้โดยไม่ติดเงื่อนไขใดๆ     
                if($fileupload1!="" && @in_array($ext,$allowed_types) && $canUpload==1){ 
                        // ตรวจสอบว่าเป็นไฟล์อัพโหลด และทำการย้ายไฟล์ไปยัง path ที่กำหนด           
                        if(is_uploaded_file($fileupload1) && @move_uploaded_file($fileupload1,$imglocate.$file_up_arr)){
                            array_push($file_up,$file_up_arr);
                            @chmod($imglocate.$file_up_arr,0777); // เปลี่ยน permission ของไฟล์ ส่วนใหย๋ค่ำสั่ง chmod จะใช้ไม่ได้                               
                        }
                }
            }
            if(count($file_up)==0){
                $file_up=NULL; // อัพโหลดไม่ได้ ให้เป็น NULL    
            }
        }else{
            $fileupload1=$img["tmp_name"]; // ข้อมูลไฟล์อัพโหลด
            $data_Img=@getimagesize($fileupload1); // หาความกว้าง ความสูงของรูป
            $g_img=explode(".",$img["name"]); // แยกข้อมูลจากชื่อไฟล์ เพื่อหา ชื่อไฟล์ นามสกุลไฟล์
            $ext = strtolower(array_pop($g_img));  // แยกนามกุลไฟล์ออกมา แล้วปรับให้เป็นตัวพิมพ์เล็ก
            $file_up=time().".".$ext;  // กำหนดชื่อไฟล์ใหม่ ในที่นี้จะเป็นในรูปแบบ เช่น 1234556789.jpg                  
            $canUpload=0; // กำหนดสถานะอัพโหลดเริ่มต้น
            if(isset($data_Img) && $data_Img[0]>0 && $data_Img[1]>0){ // ตรวงสอบว่ามีข้อมูลเกี่ยวกับรูปหรือไม่ เช่น ความกว้าง สูง
                if($img["size"]<=$limit_size){   // ขนาดของรูปที่อัพโหลด จะต้องไม่เกิน ค่าที่กำหนด           
                    if($limit_width && $limit_height){ // ถ้ามีการกำหนดให้ตรวจสอบ ขนาดความกว้างและสูง ของรูป
                        if($data_Img[0]<=$limit_width && $data_Img[1]<=$limit_height){
                            $canUpload=1;
                        }                   
                    }elseif($limit_width>0 && $limit_height==false){// ถ้ามีการกำหนดให้ตรวจสอบ เฉพาะขนาดความกว้าง ของรูป
                        if($data_Img[0]<=$limit_width){
                            $canUpload=1;
                        }       
                    }elseif($limit_width==false && $limit_height>0){// ถ้ามีการกำหนดให้ตรวจสอบ เฉพาะขนาดความสูง ของรูป
                        if($data_Img[1]<=$limit_height){
                            $canUpload=1;
                        }                                               
                    }else{ // ไม่มีการรวจสอบเพิ่มเติมใดๆ นอกจากขนาดไฟล์
                        $canUpload=1;                   
                    }           
                }          
            }  
            // เมื่อมีข้อมูลไฟล์ที่อัพโหลด และเป็นไฟล์ที่อนุญาต และสามารถอัพโหลดได้โดยไม่ติดเงื่อนไขใดๆ     
            if($fileupload1!="" && @in_array($ext,$allowed_types) && $canUpload==1){ 
                    // ตรวจสอบว่าเป็นไฟล์อัพโหลด และทำการย้ายไฟล์ไปยัง path ที่กำหนด           
                    if(is_uploaded_file($fileupload1) && @move_uploaded_file($fileupload1,$imglocate.$file_up)){
                        @chmod($imglocate.$file_up,0777); // เปลี่ยน permission ของไฟล์ ส่วนใหย๋ค่ำสั่ง chmod จะใช้ไม่ได้                               
                    }
            }else{
                $file_up=NULL; // อัพโหลดไม่ได้ ให้เป็น NULL
            }           
        }
    }
    return $file_up; // ส่งกลับชื่อไฟล์
}
?>