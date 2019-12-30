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

<?php include 'head.php'; ?>

<body class="team">
    <div class="container mt-4">
        <div class="row">
            <h1 class="text-center mb-2 w-100">Welcome to the Squad!</h1>
        </div>
        <?php include 'schedule.php'; ?>
        <div class="row">
            <p class="lead text-center mb-4 w-100">Let's view the lineup...</p>
        </div>
        <div class="row">
            <div id="field">
                <div class="half mx-auto">
                    <div class="single striker">
                        <div class="player" id="lugene">
                            <div class="placard">
                                Lugene
                            </div>
                        </div>
                    </div>
                    <div class="double top attack">
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
                    <div class="single" id="keeper">
                        <div id="alli" class="player">
                            <div class="placard">
                                Alli
                            </div>
                        </div>
                    </div>
                </div>
                <div id="topBox"></div>
                <div id="center"></div>
                <div id="bottomBox"></div>
            </div>
        </div>
    </div>
    
    <?php include 'scripts.php'; ?>
</body>

</html>