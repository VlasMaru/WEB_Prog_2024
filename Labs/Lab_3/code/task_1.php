<?php
# Task 1. Регулярные выражения
# a) Напишите регулярку, которая найдет строки 'abba', 'adca', 'abea' по шаблону: буква 'a', два любых символа, буква 'b'. Пример строки: $str = 'ahb acb aeb aeeb adcb axeb';
# b) Дана строка с целыми числами 'a1b2c3'. С помощью регулярки преобразуйте строку так, чтобы вместо этих чисел стояли их кубы.
echo '<h1>Task №1</h1>';
$input_sting = 'asso arg akab aaa adrb';
$regular_exp = '/a[a-z]{2}b/';
$res= array();

preg_match_all($regular_exp, $input_sting, $res);  #Выполняет глобальный поиск шаблона в строке
echo '<h2> Part A </h2>';
for ($i = 0; $i < sizeof($res[0]); $i++) {
    echo "<p>{$res[0][$i]}</p>";
}

echo '<h2> Part B </h2>';

$input_sting_2 = 'c2a1t3';

echo "<p>$input_sting_2</p>";
$regular_exp_2 = '/([a-z])([0-9])/';
$res_2 = array();
$res_string = preg_replace_callback($regular_exp_2,
    function ($matches) {
        return $matches[1] . pow(intval($matches[2]), 3);
    },
    $input_sting_2);
echo "<p>$res_string</p>";
echo '<h1>Other tasks: </h1>';

echo '<h2>Task 2: </h2>';


echo "<a href='./task_2/task_2_a.php_a.php' >Task №2.A</a><br>";

echo "<a href='./task_2/task_2_a.php_b.php' >Task №2.B</a><br>";

echo "<a href='./task_2/task_2_a.php_c.php' >Task №2.C</a><br><br>";

echo '<h2>Task 3: </h2>';

echo "<a href='task_3/task_3.php.' >Task №3</a>";