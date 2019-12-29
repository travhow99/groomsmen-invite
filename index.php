<?php
    if (!$_GET['name'] || empty($_GET['name'])) {
        echo 'wtf';
        // Redirect to error page
        header('Location: https://travishowell.net/error');
    }
    // Check if user has answered?
    if ($responded) {
        // Redirect to squad list
    }

    if ($_GET['name'] === 'chase' || $_GET['name'] === 'david') {
        $role = '(co-)Best Man';
    } else {
        $role = 'Groomsman';
    }

    $name = ucfirst($_GET['name']);
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