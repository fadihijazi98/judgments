<?php
    class connection {
        private static $conn = null;
        public static function connect() {
            if(self::$conn==null){
                $servername = "localhost";
                $username = "root";
                $password = "";

                try {
                    self::$conn = new PDO("mysql:host=$servername;dbname=ahmad", $username, $password);
                    // set the PDO error mode to exception
                    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $e)
                {
                }
            }
            return self::$conn;
        }
    }
?>