<?php
    require_once 'connect.php';
    class UserAccessOJT extends database{

        public function userSignup($uname,$email,$pass){

            $sql = "INSERT INTO user(`user_name`, user_email, user_password) 
                    VALUES ('$uname','$email','$pass')";
            $result = $this->conn->query($sql);
            if($result == TRUE){
                return 1;
            }else{
                return 0;
            }
        }
    

        public function checkDuplicates($uname){
            $sql ="SELECT * FROM user WHERE user_name = '$uname' ";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function login($uname, $pass){
        
            $sql = "SELECT * FROM user WHERE `user_name` = '$uname' 
                    AND `user_password` = '$pass'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        } 

    }

?>