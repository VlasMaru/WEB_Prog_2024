<?php
function redirectToHome()
{
    header('Location: /task_3/task_3.php');
    exit();
}

if (false === isset($_POST['email'], $_POST['category'], $_POST['title'], $_POST['description']))
{
    header('Location: /');
    exit();
}

$category = $_POST['category'];
$title = $_POST['title'];
$desc = $_POST['description'];

$filePath = "categories/{$category}/{$title}.txt";

if (false === file_put_contents($filePath, $desc))
{
    throw new Exception('Oops! I think, that something went wrong!');
}
chmod($filePath, 0777);
redirectToHome();