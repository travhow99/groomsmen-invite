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

$stmt = $mysqli->prepare("SELECT name, response FROM people");
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) exit('No rows');
while ($row = $result->fetch_assoc()) {
    $person[$row['name']] = $row['response'];
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/830e5c8d3a.js"></script>
    <title>Groomsmen</title>
</head>

<body class="team">
    <div class="container mt-4">
        <div class="row">
            <h1 class="text-center mb-2 w-100">Welcome to the Squad!</h1>
            <br>
            <p class="lead text-center mb-4 w-100">Let's view the lineup...</p>
        </div>
        <div class="row">
            <div id="field">
                <div class="half mx-auto">
                    <div class="double top">
                        <div class="player" <?php if ($person['Chase']) { ?> id="chase" <?php } ?>>
                            <div class="captain"></div>
                            <div class="placard">
                                <?php
                                if ($person['Chase']) {
                                    echo 'Chase';
                                } else {
                                    echo 'TBD...';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="player" <?php if ($person['David']) { ?> id="david" <?php } ?>>
                            <div class="captain"></div>
                            <div class="placard">
                                <?php
                                if ($person['David']) {
                                    echo 'David';
                                } else {
                                    echo 'TBD...';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="single bottom">
                        <div class="player" <?php if ($person['Travis']) { ?> id="travis" <?php } ?>>
                            <div class="captain"></div>
                            <div class="placard">
                                <?php
                                if ($person['Travis']) {
                                    echo 'Travis';
                                } else {
                                    echo 'TBD...';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="half mx-auto">
                    <div class="double top mid">
                        <div class="player" <?php if ($person['Zack']) { ?> id="zack" <?php } ?>>
                            <div class="placard">
                                <?php
                                if ($person['Zack']) {
                                    echo 'Zack';
                                } else {
                                    echo 'TBD...';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="player" <?php if ($person['Amir']) { ?> id="amir" <?php } ?>>
                            <div class="placard">
                                <?php
                                if ($person['Amir']) {
                                    echo 'Amir';
                                } else {
                                    echo 'TBD...';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="double bottom">
                        <div class="player" <?php if ($person['Mike']) { ?> id="mike" <?php } ?>>
                            <div class="placard">
                                <?php
                                if ($person['Mike']) {
                                    echo 'Mike';
                                } else {
                                    echo 'TBD...';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="player" <?php if ($person['Eric']) { ?> id="eric" <?php } ?>>
                            <div class="placard">
                                <?php
                                if ($person['Eric']) {
                                    echo 'Eric';
                                } else {
                                    echo 'TBD...';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="topBox"></div>
                <div id="center"></div>
                <div id="bottomBox"></div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="app.js"></script>
</body>

</html>