<!DOCTYPE html>
<html lang = "ru">

<head>
    <meta charset="utf-8">
    <title> TASK_2_C </title>
</head>

<body style="background-color: #3f9ea2;">
<div>

    <!-- PHP   -->
    <?php
    $_SESSION['input_data'] = array();
    $_SESSION['input_data'][] = !empty($_POST['name']) ? $_POST['name'] : '';
    $_SESSION['input_data'][] = !empty($_POST['age']) ? $_POST['age'] : '';
    $_SESSION['input_data'][] = !empty($_POST['salary']) ? $_POST['salary'] : '';
    $_SESSION['input_data'][] = !empty($_POST['wow_class']) ? $_POST['wow_class'] : '';
    echo '<ul>';
    foreach ($_SESSION['input_data'] as $val) {
        echo '<li>' . $val . '</li>';
    }
    echo '</ul>';
    ?>
    <!-- /PHP   -->
</div>
</body>
</html>

