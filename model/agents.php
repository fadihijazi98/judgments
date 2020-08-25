<?php
    require_once '../config/connection.php';
    $conn = connection::connect();
    if(isset($_POST['agent_name'])) {
        $name =  $_POST['agent_name'];
        $ssn = $_POST['agent_ssn'];
        $phone1 = $_POST['agent_phone1'];
        $phone2 = $_POST['agent_phone2'];
        $address = $_POST['agent_address'];
        $issue = $_POST['agent_issue'];
        $defendant = $_POST['agent_defendant'];
        $budget = $_POST['agent_budget'];
        $conn->query("INSERT INTO `agents` (`name`, `ssn`, `phone1`, `phone2`, `address`, `agent_defendant_name`, `budget`) VALUES ('$name', '$ssn', '$phone1', '$phone2', '$address', '$defendant', '$budget');");
        $id = $conn->lastInsertId();
        $conn->query("INSERT INTO `agnets-issues` (`agent_id`, `issue_id`) VALUES ('$id', '$issue');");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else if(isset($_POST['agent_edit'])) {
        // ajax request .. *
        $id = $_POST['id'];
        $type = $_POST['type'];
        $value = trim($_POST['value']);
        $sql = "UPDATE `agents` SET `$type` = '$value' WHERE `agents`.`id` = $id";
        $conn->query($sql);
    } else if (isset($_POST['agent_id'])) {
        $id = $_POST['agent_id'];
        $conn->query('DELETE FROM agents WHERE id ='.$id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }