<?php
require_once __DIR__ . '/wop.php';


if (empty($_POST['email'])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}
$inputData = array();
$inputData[] = $_POST['email'];
$inputData[] = !empty($_POST['title']) ? $_POST['title'] : "untitled";
$inputData[] = $_POST['description'];
$inputData[] = !empty($_POST['category']) ? $_POST['category'] : "other";
$db = extracted();
$command = $db->query("INSERT INTO web.ad (email, title, description, category) VALUES ( '{$inputData[0]}', '{$inputData[1]}', '{$inputData[2]}', '{$inputData[3]}' )");


header('Location: /');
exit();