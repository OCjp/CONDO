
<?php
    class database {

        private $servername = "localhost";
        private $username = "root";
        private $password = "";  //if you use mammp , you should type "root".
        private $database = "condo";

        public $conn;    //constructor
        //this will cnstruct the connection
        public function __construct(){
            //this variable points at itself
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
            if($this->conn->connect_error){
                die("Conneciton Error: ".$this->conn->connect_error);
            }
            return $this->conn;
        }
    }

?>