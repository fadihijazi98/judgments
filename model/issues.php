<?php
    require_once '../config/connection.php';
    $conn = connection::connect();
    if(isset($_POST['issue_name'])) {
        $name = $_POST['issue_name'];
        $number = $_POST['issue_number'];
        $next_session = $_POST['next_session'];
        $end_at = $_POST['end_at'];
        $delay_cause = $_POST['delay_cause'];
        $current_state = $_POST['current_state'];
        $judgment = $_POST['judgment'];
        $number_in_archive = $_POST['number_in_archive'];
        $conn->query("INSERT INTO `issues` (`id`, `name`, `number`, `next_session`, `end_at`, `delay_cause`, `current_state`, `judgment`, `number_in_archive`) VALUES (NULL, '$name', '$number', '$next_session', '$end_at', '$delay_cause', '$current_state', '$judgment', '$number_in_archive');");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else if(isset($_POST['issue_edit'])) {
        // ajax request .. *
        $id = $_POST['id'];
        $type = $_POST['type'];
        $value = trim($_POST['value']);
        $sql = "UPDATE `issues` SET `$type` = '$value' WHERE `issues`.`id` = $id";
        $conn->query($sql);
    } else if(isset($_POST['issue_id'])) {
        $id = $_POST['issue_id'];
        $conn->query('DELETE FROM issues WHERE id ='.$id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }