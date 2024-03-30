<!doctype html>
<head>
    <meta charset="utf-8">
    <title> TASK_2_B_resp </title>
</head>
<body>
<div>
    <!-- PHP   -->
    <?php
    $_SESSION['surname'] = !empty($_POST['surname']) ? $_POST['surname'] : '';
    $_SESSION['name'] = !empty($_POST['name']) ? $_POST['name'] : '';
    $_SESSION['age'] = !empty($_POST['age']) ? $_POST['age'] : '';
    ?>
    <!-- /PHP   -->

    <p align = "center">HUMAN'S SURNAME: <?= $_SESSION['surname'] ?></p>
    <p align = "center">HUMAN'S NAME: <?= $_SESSION['name'] ?></p>
    <p align = "center">HUMAN'S AGE: <?= $_SESSION['age'] ?></p>
</div>
</body>
