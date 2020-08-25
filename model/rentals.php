<?php
require_once '../config/connection.php';
$conn = connection::connect();
if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $lessor_name = $_POST['lessor_name'];
    $tenant_name = $_POST['tenant_name'];
    $region = $_POST['region'];
    $period = $_POST['period'];
    $amount = $_POST['amount'];
    $start_rent = $_POST['start_rent'];
    $end_rent = $_POST['end_rent'];
    $renewal = $_POST['renewal'];
    $currency = $_POST['currency'];
    $payment = $_POST['payment'];
    $conn->query("INSERT INTO `rents` (`name`, `lessor_name`, `tenant_name`, `region`, `period`, `amount`, `start_rent`, `end_rent`, `renewal`, `currency`, `payment`) VALUES ('$name', '$lessor_name', '$tenant_name', '$region', '$period', '$amount', '$start_rent', '$end_rent', '$renewal', '$currency', '$payment');");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else if(isset($_POST['renatil_edit'])) {
    // ajax request .. *
    $id = $_POST['id'];
    $type = $_POST['type'];
    $value = trim($_POST['value']);
    $sql = "UPDATE `rents` SET `$type` = '$value' WHERE `rents`.`id` = $id";
    $conn->query($sql);
} else if(isset($_POST['delete'])) {
    $id = $_POST['rental_id'];
    $conn->query('DELETE FROM `rents` WHERE id ='.$id);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}