<?php

    class DatabaseConn {  

        private $conn;

        public function dbOpen(){

            $dbhost = "localhost";

            $root = "root";
            $root_password = "rootpass";

            $dbUser = 'newuser';
            $dbPass = 'newpass';
            $dbName = "newdb";

            try {
                $dbh = new PDO("mysql:host=$host", $root, $root_password);

                $dbh->exec("CREATE DATABASE `$db`;
                CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass';
                GRANT ALL ON `$db`.* TO '$user'@'localhost';
                FLUSH PRIVILEGES;")or die(print_r($dbh->errorInfo(), true));
            }
            catch (PDOException $e) {
                die("DB ERROR: " . $e->getMessage());
            }
            try {


                $this->conn = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUser, $dbPass);
                $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
                $this->conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
                $this->conn->setAttribute(PDO::ATTR_AUTOCOMMIT, true);
                $this->conn->setAttribute(PDO::MYSQL_ATTR_LOCAL_INFILE, true);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->conn;

            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>