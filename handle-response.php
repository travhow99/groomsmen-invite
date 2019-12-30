<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';

$mysqli = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

$name = $mysqli->real_escape_string($_POST['name']);
$response = $mysqli->real_escape_string($_POST['response']) === 'accept' ? 1 : 0;

$stmt = $mysqli->prepare("UPDATE people SET response = ?, updated = now() WHERE name = ?");
$stmt->bind_param("is", $response, $name);
$stmt->execute();
if ($stmt->affected_rows === 0) {
    exit('No rows updated');
}
$stmt->close();

$true_response = $mysqli->real_escape_string($_POST['response']);

$email = "Travis -- \r\n$name has responded $true_response to your invite.\r\nCheers.";

$success = mail('trav.horn@gmail.com', 'New Groomsmen Response', $email);
if (!$success) {
    $errorMessage = error_get_last()['message'];
}

// TODO: Send email notification to travis
if ($response) {
    echo 'success';
} else {
    echo 'nogo';
}