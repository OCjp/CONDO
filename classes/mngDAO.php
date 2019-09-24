<?php
    require_once 'connect.php';
    class ManageAccessO extends database{

        //About Room//
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

        // public function addRoom($roomno,$build,$contDate,$finDate,$tenant,$facility){

        //     $sql = "INSERT INTO room(room_no, building, contract_date, contract_fin_date, 
        //             tenant, facility) VALUES ('$roomno','$build','$contDate','$finDate','$tenant','$facility' )";
        //     $result = $this->conn->query($sql);
        //     if($result == TRUE){
        //         $message = "A room is resisterd successfully!";
        //         header("Location: add-room.php?$message=$message");
        //     }else{
        //         $message = "It doesn't resisterd..";
        //         header("Location: add-room.php?$message=$message");
        //     }
        // }

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


        public function getRoomEmpty(){

            $sql = "SELECT * FROM room where vacancy = 'V' ";
            $result = $this->conn->query($sql);
            $rows = array();
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
                return $rows;
        }

        public function getRoomOccupy(){

            $sql = "SELECT * FROM room where vacancy = 'I' ";
            $result = $this->conn->query($sql);
            $rows = array();
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
                return $rows;
        }


        //About application
        //addappは間違いで使用していない
        // public function addapp($appname,$call,$mail,$roomno,$build,$desireDate,$getDate,$other,$status){

        //     $sql = "INSERT INTO `application`(`app_name`, app_call_no, app_mail, app_room_no, 
        //             app_build_name, app_desire_date, app_get_date, app_other, app_status) 
        //             VALUES ('$appname','$call','$mail','$roomno','$build','$desireDate','$getDate','$other','$status' )";
        //     $result = $this->conn->query($sql);
        //     if($result == TRUE){
        //         echo "Apps is accepted successfully!";
        //     }else{
        //         echo "It doesn't be accepted..";
        //     }
        // }

        
        public function getapp(){

            $sql = "SELECT * FROM `application` ";
            $result = $this->conn->query($sql);
            $rows = array();
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
                return $rows;
        }

        function getOneApp($id){
            $conn = connection();
            $sql = "SELECT * FROM `application` WHERE app_id = '$id' AND app_status = 'A'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }
    
        function updateApp($appname,$call,$mail,$roomno,$build,$desireDate,$getDate,$other){
            $conn = connection();
            $sql = "UPDATE `application` SET `app_name` = '$appname', app_call_no = '$call', app_mail='$mail',
                    app_room_no ='$roomno', app_build_name ='$build', app_desire_date='$desireDate', app_get_date ='$getDate'  
                    , app_other ='$other'
                    WHERE app_id = '$id' AND ";
            $result = $conn->query($sql);
            if($result == TRUE){
                echo "Finished treat an apptication Successfully!";
            }else{
                echo "Error!";
            }
    
        }

        //For tenant page..//

        public function addTenant($name,$call,$mail,$room,$build,$age,$start,$fin){

            $sql = "INSERT INTO tenant(tenant_name, tenant_call_no, tenant_mail, room_no, 
                    build_name, age, contract_term_start, contract_term_fin) VALUES ('$name','$call','$mail','$room','$build','$age','$start','$fin' )";
            $result = $this->conn->query($sql);
            if($result == TRUE){
                echo "A tenant is resisterd successfully!";
            }else{
                echo "It doesn't resisterd..";
            }
        }

        public function getTenant(){

            $sql = "SELECT * FROM tenant ";
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