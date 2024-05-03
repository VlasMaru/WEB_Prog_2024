<?php
ob_start();
require_once "vendor/autoload.php";

use Google\Client;
use Google\Service\Drive;
use Google\Service\Sheets\SpreadSheet;

if (empty($_POST['email'])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}
$inputData = array();
$inputData[] = !empty($_POST['category']) ? $_POST['category'] : "other";
$inputData[] = $_POST['email'];
$inputData[] = !empty($_POST['title']) ? $_POST['title'] : "untitled";
$inputData[] = $_POST['description'];

$apiKey = "AIzaSyAcjTcbnZNvB80DNG1oOw9kVGGG1A7acHo";
$clientId = "****";
$clientSecret = "****";

$client = new Google_Client();
$client->setApplicationName("testApplicationName");
$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType("offline");
$client->setAuthConfig( __DIR__ ."/meta-glazing-421820-7eec83cc85e3.json"); #####
$client->useApplicationDefaultCredentials();
$client->addScope('https://www.googleapis.com/auth/spreadsheets');

$service = new Google_Service_Sheets($client);
$spreadsheetId = '1NeDzRwioq0Yp_EgtCmIgHff1RGu0FdPd11Xqnrbbuus';
$range = "list";

$values = [[$inputData[0], $inputData[2], $inputData[3], $inputData[1]]];
try {
    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
    $lastRowNumber = sizeof($response->getValues());

    $body = new Google_Service_Sheets_ValueRange(['values' => $values]);
    $options = array('valueInputOption' => 'RAW');

    $service->spreadsheets_values->update($spreadsheetId, 'list!A' . ($lastRowNumber + 1), $body, $options);
} catch (\Google\Service\Exception $e) {
    echo "ERROR receiving data";
}


header('Location: /');
exit();