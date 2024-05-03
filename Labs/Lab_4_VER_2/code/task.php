<?php
$categor = ['Smartphones', 'Other'];
#1NeDzRwioq0Yp_EgtCmIgHff1RGu0FdPd11Xqnrbbuus
?>

<!doctype html>
<html lang = "en">
<head>
    <meta charset="UTF-8" />
    <meta name = "viewport"
          content = "width=device-width, user-scalable, initia;-scale=1.0, maximum-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <title> Task_3 </title>
</head>
<body>
    <form action = "save.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <label for="category">Сategory</label>

        <?php
        $categories = scandir('categories');
        echo '<select name="category" required>';
        foreach ($categories as $category)
        {
            if ((is_dir("categories/$category")) && ($category != '.') && ($category != '..'))
            {
                echo "<option value='$category'>$category</option>";
            }
        }
        echo '</select>';
        ?>


        <label for="title">Title</label>
        <input type="text" name="title" required>

        <label for="description">Description</label>
        <textarea rows="3" name="description"></textarea>
        <input type="submit" value="Save">
</form>


<div id = "table">
    <table>
        <thead>
        <th>Category</th>
        <th>Title</th>
        <th>Description</th>
        </thead>
        <tbody>
        <?php
        $categoryDir = opendir('categories');
        while ($file = readdir($categoryDir))
        {
            if ((is_dir('categories/'.$file)) && ($file != '.') && ($file != '..'))
            {
                $internalDir = opendir('categories/'.$file);
                while ($add = readdir($internalDir))
                {
                    if ($add != '.' && $add != '..')
                    {
                        $fileTmp = fopen('categories/'.$file.'/'.$add, 'r');
                        $tmp = "";
                        while ($line = fgets($fileTmp))
                        {
                            $tmp .= $line;
                        }
                        fclose($fileTmp);
                        echo '<tr>';
                        echo "<td>$file</td>";
                        echo "<td>".substr($add, 0, strlen($add) - 4)."</td>";
                        echo "<td>$tmp</td>";
                        echo '</tr>';
                    }
                }
            }
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>


<?php

require_once "vendor/autoload.php";

use Google\Client;
use Google\Service\Drive;
use Google\Service\Sheets\SpreadSheet;

$apiKey = "AIzaSyAcjTcbnZNvB80DNG1oOw9kVGGG1A7acHo";
$clientId = "****";
$clientSecret = "****";

$client = new Google_Client();
$client->setApplicationName("testApplicationName");
$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType("offline");
try {
    $client->setAuthConfig( __DIR__ ."/meta-glazing-421820-7eec83cc85e3.json");
} catch (\Google\Exception $e) {
    echo "<p> Error found X-X </p>";
}
$client->useApplicationDefaultCredentials();
$client->addScope('https://www.googleapis.com/auth/spreadsheets');

$service = new Google_Service_Sheets($client);
$spreadsheetId = '1NeDzRwioq0Yp_EgtCmIgHff1RGu0FdPd11Xqnrbbuus';

$range = "list";
$response = $service->spreadsheets_values->get($spreadsheetId, $range);

echo "<table>";
for ($i = 1; $i < sizeof($response->getValues()); $i++) {
    echo "<tr>";
    for ($j = 0; $j < 3; $j++) {
        echo "<td>";
        if ($j < sizeof($response->getValues()[$i])) {
            echo $response->getValues()[$i][$j];
        }
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>
</div>
</body>
</html>

