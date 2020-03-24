<?php
    session_start();

    if (empty($_SESSION['user'])) {
        header("Location: ../index.php");
    }

    $name = $_SESSION['user']['name'];
    $username = $_SESSION['user']['username'];
    $email = $_SESSION['user']['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- EXTERNAL -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../external/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/css/reset.css">
    <link rel="stylesheet" href="../styles/css/profile/main.css">

    <!-- PAGE TITLE -->
    <title>project_0</title>
</head>
<body>
    
    <main>
        <div class="container profile">
            <div class="row user-data text-center">
                <div class="col-6 fullname">
                    <h3><?= $name ?></h3>
                </div>
                <div class="col-6 username">
                    <p><?= $username ?></p>
                </div>
                <div class="col-6 email">
                    <p><?= $email ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button class="logout">
                        <a href="logout.php">Logout</a>
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- JS FILES -->
    <script src="../external/jquery/jquery.js"></script>
    <script src="../external/bootstrap4/js/bootstrap.min.js"></script>
    <script src="../scripts/main.js"></script>
</body>
</html>