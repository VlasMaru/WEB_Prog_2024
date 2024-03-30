<!DOCTYPE html>
<html lang = "ru">

<head>
    <meta charset="utf-8">
    <title> TASK_2_A </title>
</head>

<body style="background-color: #3f9ea2; ">
<div>
    <h1 align="center"> Форма. Сессии и Куки.</h1>
    <form method="post">
        <p align = "center">
        <label for="text">
            <textarea name="text_area" rows="10" cols="60"></textarea>
        </label><br>

            <input type="submit" value="Нажмите чтобы узнать количество слов и количество символов в тексте">
        </p>
    </form>

    <!-- PHP   -->
<?php
    $input_text = !empty($_POST['text_area']) ? $_POST['text_area'] : '';
    $regular_exp= '/[a-z0-9а-яё.]+/ui';
    $matches = array();
    $count = preg_match_all($regular_exp, $input_text, $matches);

    ?>
    <!-- /PHP -->

    <p align = "center">
        <strong> Слов в тексте:</strong> <?= $count ?>
    </p>
    <p align = "center">
        <strong> Длина текста: </strong> <?= mb_strlen($input_text) ?>
    </p>
</div>
</body>
</html>