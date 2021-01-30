<?php


    class YTConnect {
       private $host = 'localhost';
       private $dbName = 'youtube';
       private $user = 'root';
       private $pass = '';

        public function connect() {
            try{
                $conn = new PDO('mysql:host=localhost;dbname=youtube', 'root', '');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            } catch( PDOException $e) {
                echo ' Databade Error: ' . $e->getMessage();
            }
        }
    }
?>

