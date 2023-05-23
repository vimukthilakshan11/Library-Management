<?php 
   final class dbconnect{
      public $servername = "localhost";
      public $username = "root";
      public $password = "1234";
      public $dbname = "lms";
      public $conn = null;

 
      public function checkDb(){
          if(is_null($this->conn)){
            $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
          }
           // Check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
      }
      public function getConnection()
      {
          $this->checkDb();
          return $this->conn;
      }

      public function insertIntoDb($query)
    {
        $this->checkDb();
        if (!mysqli_query($this->conn, $query)) {
            echo "ERROR: Could not able to execute $query. " . mysqli_error($this->conn);
        }
    }

    public function getfromdb($query)
    {
        $this->checkDb();
        if ($result = mysqli_query($this->conn, $query)) {   
            
           return $result;
        } else {
            echo "ERROR: Could not able to execute $query. " . mysqli_error($this->conn);
        }
    }

    public function getConn(){
        $this->checkDb();
        return $this->conn;
        
    }

   }
   
?>