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
        $role = 'Groosman';
    }

    $name = ucfirst($_GET['name']);
?>
<script>
    const name = '<?php echo $name; ?>';
    console.log(name)
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/830e5c8d3a.js"></script>
    <title>Groomsmen</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <h1 class="mx-auto mb-2">You've Received a Call...</h1>
            <p class="lead mx-auto mb-4"><?php echo $name; ?>, will you join the squad as one of Travis's <?php echo $role; ?>?</p>
        </div>
        <div class="row">
            <div class="col text-center">
                <button class="btn response decline">
                    No, f him<br>
                    <i class="far fa-check-circle"></i>
                </button>
            </div>
            <div class="col text-center">
                <button class="btn response accept">
                    Yes, of course!<br>
                    <i class="far fa-times-circle"></i>
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="app.js"></script>
</body>

</html>