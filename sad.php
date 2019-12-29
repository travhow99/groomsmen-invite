<?php include 'head.php'; ?>

<body class="team">
    <div class="container mt-4">
        <div class="row">
            <h1 class="text-center mb-2 w-100">Travis will be sad to hear the news...</h1>
            <div class="text-center mb-4 w-100">
                <i class="fas fa-frown" style="font-size: 120px"></i>
            </div>
            <p class="lead text-center w-100">Don't worry, you can still change your decision <a href="index.php?name=<?php echo $_GET['name']; ?>">here</a>!</p>
        </div>
    </div>

    <?php include 'scripts.php'; ?>
</body>