<?php
    require_once 'connect.php';
    class UserAccessO extends database{

        public function addForm($uname,$call,$mail,$roomno,$build,$date,$other){

            $sql = "INSERT INTO `application`(`app_name`, app_call_no, app_mail, app_room_no, 
                    app_build_name, app_desire_date,app_other) VALUES ('$uname','$call','$mail','$roomno','$build','$date','$other' )";
            $result = $this->conn->query($sql);
            if($result == TRUE){
                echo "applayied successfully!";
            }else{
                echo "It doesn't resisterd..";
            }
        }






        

// 下のはサンプルなので後で消す！



}


       

    



?>