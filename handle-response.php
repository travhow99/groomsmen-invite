<?php

require_once 'config.php';

$mysqli = new MySQLi(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$name = $mysqli->real_escape_string($_POST['name']);
$response = $mysqli->real_escape_string($_POST['response']) === 'accept' ? 1 : 0;

var_dump($name);
var_dump($response);

$stmt = $mysqli->prepare("UPDATE people SET response = ?, updated = now() WHERE name = ?");
$stmt->bind_param("is", $response, $name);
$rc = $stmt->execute();
if ( false===$rc ) {
    die('execute() failed: ' . htmlspecialchars($stmt->error));
  }
  
if($stmt->affected_rows === 0) exit('No rows updated');
$stmt->close();




if ($result = $mysqli->query("SHOW TABLES")) {
    foreach ($result->fetch_assoc() as $row) {
        var_dump($row);
    }
}

