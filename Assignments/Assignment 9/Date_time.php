<?php
    
    class Date_Time{
        
        private $conn;

        function __construct(){

            $dbHost = 'localhost';
            $dbName = 'srjoseph';
            $dbUsr = 'srjoseph';
            $dbPass = 'QwQwZ5UxSWAS';
      
            $this->conn = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUsr, $dbPass);

        }

        function checkSubmit($dtm){
            date_default_timezone_set('America/New_York');

            $timestamp = strtotime($dtm['datetime']);

            $note = $dtm['note'];

            $mdt = $dtm['datetime'];
            
            $sql= "CREATE TABLE tbl_notes( ".
            "date_time, VARCHAR(100) NOT NULL, ".
            "note VARCHAR(100) NOT NULL ".
            "PRIMARY KEY ( tutorial_id )); ";
           $sql = "INSERT INTO tbl_notes (date_time,note) VALUES('$mdt','$note');";

            
            if($this->conn->query($sql)){

                echo "Added Successfully";

            }else{

                echo "Error ".$sql;

            }

        }

        function getNotes($begin,$end){

            $sql = "SELECT * FROM tbl_notes WHERE CAST(date_time AS DATE) BETWEEN '$begin' AND '$end' ORDER BY date_time;";

            $result = $this->conn->query($sql);

            $notes = array();

            if($result->num_rows>0){

                while($row = $result->fetch_assoc()){

                    $note = array("date_time"=>$row['date_time'],"note"=>$row['note']);

                    array_push($notes,$note);

                }

            }

            return $notes;

        }

    }

?>