<?php
    if (!$_GET['name'] || empty($_GET['name'])) {
        // Redirect to error page
        header('Location: https://travishowell.net/error');
    }
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

    $name = ucfirst($_GET['name']);
    
    $responded = $person[$name];
    // Check if user has answered?
    if ($responded) {
        // Redirect to squad list
        header('Location: team.php');
    } elseif (!array_key_exists($name, $person)) {
        header('Location: https://travishowell.net/error');
    }

    if ($_GET['name'] === 'chase' || $_GET['name'] === 'david') {
        $role = '(co-)Best Man';
    } else {
        $role = 'Groomsman';
    }

?>
<script>
    const name = '<?php echo $name; ?>';
    console.log(name)
</script>

<?php include 'head.php'; ?>

<body class="home">
    <div class="container mt-4">
        <div class="row">
            <h1 class="text-center mb-2 w-100">You've Received a Call...</h1>
            <p class="lead text-center mb-4 w-100"><?php echo $name; ?>, will you join the squad as one of Travis's <?php echo $role; ?>?</p>
        </div>
        <?php include 'schedule.php'; ?>
        <div class="row">
            <div class="col text-center">
                <button class="btn response decline">
                    No, f him<br>
                    <i class="far fa-times-circle"></i>
                </button>
            </div>
            <div class="col text-center">
                <button class="btn response accept">
                    Yes, of course!<br>
                    <i class="far fa-check-circle"></i>
                </button>
            </div>
        </div>
    </div>

    <?php include 'scripts.php'; ?>
</body>

</html>