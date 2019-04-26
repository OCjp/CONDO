<?php
    require_once 'connect.php';
    class ManageAccessO extends database{

        public function addRoom($roomno,$build,$contDate,$finDate,$tenant,$facility){

            $sql = "INSERT INTO room(room_no, building, contract_date, contract_fin_date, 
                    tenant, facility) VALUES ('$roomno','$build','$contDate','$finDate','$tenant','$facility' )";
            $result = $this->conn->query($sql);
            if($result == TRUE){
                echo "A room is resisterd successfully!";
            }else{
                echo "It doesn't resisterd..";
            }
        }


        public function getRoom(){

            $sql = "SELECT * FROM room ";
            $result = $this->conn->query($sql);
            $rows = array();
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
                return $rows;
        }


        public function getOneRoom($id){
            $sql = "SELECT * FROM room WHERE room_id = '$id'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function roomUpdate($id,$roomno,$build,$vacancy,$contdate,$findate,$tenant,$facility){
            $sql = "UPDATE room SET room_id = '$id', room_no = '$roomno', 
                    building = '$build', vacancy = '$vacancy', contract_date = '$contdate', 
                    contract_fin_date = '$findate', tenant = '$tenant', facility = '$facility' 
                    WHERE room_id = '$id'";
            $result = $this->conn->query($sql);
            
            if($result == TRUE){
                echo "Updated Successfully!";
            }else{
                echo "Error!";
            }
        }


        //About application
        //addappは間違いで使用していない
        public function addapp($appname,$call,$mail,$roomno,$build,$desireDate,$getDate,$other,$status){

            $sql = "INSERT INTO `application`(`app_name`, app_call_no, app_mail, app_room_no, 
                    app_build_name, app_desire_date, app_get_date, app_other, app_status) 
                    VALUES ('$appname','$call','$mail','$roomno','$build','$desireDate','$getDate','$other','$status' )";
            $result = $this->conn->query($sql);
            if($result == TRUE){
                echo "Apps is accepted successfully!";
            }else{
                echo "It doesn't be accepted..";
            }
        }

        
        public function getapp(){

            $sql = "SELECT * FROM `application` ";
            $result = $this->conn->query($sql);
            $rows = array();
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
                return $rows;
        }


// 下のはサンプルなので後で消す！



}


       

    



?>