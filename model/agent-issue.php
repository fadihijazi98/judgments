<?php
require_once '../config/connection.php';
$conn = connection::connect();
if(isset($_POST['type'])) {
    $agent_id = $_POST['agent_id'];
    $issue_id = $_POST['issue_id'];
    $conn->query('DELETE FROM `agnets-issues` WHERE agent_id = '.$agent_id.' AND issue_id = '.$issue_id);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else if(isset($_POST['issue_id'])) {
    $agent_id = $_POST['agent_id'];
    $issue_id = $_POST['issue_id'];
    $conn->query("INSERT INTO `agnets-issues` (`agent_id`, `issue_id`) VALUES ($agent_id, $issue_id);");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}