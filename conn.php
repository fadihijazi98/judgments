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
$conn = connection::connect();
if(isset($_POST['fullname'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $gcd = $_POST['gcd'];
    $conn->query("INSERT INTO `homam` (`fullname`, `email`, `number`, `gcd`) VALUES ('$fullname', '$ssn', '$email', '$number', '$gcd');");

}


?>