<?php
    session_start();

    if (!empty($_SESSION['user'])) {
        header("Location: vendor/profile.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- EXTERNAL -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="external/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/css/reset.css">
    <link rel="stylesheet" href="styles/css/main.css">

    <!-- PAGE TITLE -->
    <title>project_0</title>
</head>
<body>
    
    <!-- $_SESSION['signin-error-message'] -->
    <!-- $_SESSION['signup-error-message'] -->

    <main>
        <div class="container">
            <div class="row wrapper justify-content-center">
                <div class="col-6 forms">
                    <div class="info">
                        <h3 class="title">project_0</h3>
                        <a href="https://github.com/Ararat1/project_0" target="_blank"><i class="fab fa-github"></i> GitHub</a>
                    </div>

                    <div class="tabs">
                        <button class="signin">Sign In</button>
                        <button class="signup">Sign Up</button>
                    </div>
                    
                    <!-- PHP -->
                    <?php if (isset($_SESSION['signin-error-message'])): ?>
                    
                    <div class="server-error">
                        <p><?= $_SESSION['signin-error-message']; ?></p>
                    </div>

                    <?php endif; unset($_SESSION['signin-error-message']); ?>


                    <?php if (isset($_SESSION['signup-error-message'])): ?>

                    <div class="server-error">
                        <p><?= $_SESSION['signup-error-message']; ?></p>
                    </div>

                    <?php endif; unset($_SESSION['signup-error-message']); ?>

                    <!-- PHP -->

                    <div class="errors">
                        <p class="message text-center"></p>
                    </div>

                    <div class="form signin-form enabled">
                        <form action="vendor/actions.php" method="post" name="signin[]">
                            <input type="text" name="signin[username]" class="form-text" placeholder="username" autocomplete="off">
                            <div class="password d-flex flex-row align-items-center">
                                <input type="password" name="signin[password]" class="form-text" placeholder="password" autocomplete="off">
                                <button type="button" class="show"><i class="far fa-eye"></i></button>
                            </div>
                            <button type="submit">Sign In</button>
                        </form>
                    </div>

                    <div class="form signup-form disabled">
                        <form action="vendor/actions.php" method="post" name="signup[]">
                            <input type="text" name="signup[name]" class="form-text" placeholder="name" autocomplete="off">
                            <input type="text" name="signup[username]" class="form-text" placeholder="username" autocomplete="off">
                            <input type="email" name="signup[email]" class="form-text" placeholder="email" autocomplete="off">
                            <div class="password d-flex flex-row align-items-center">
                                <input type="password" name="signup[password]" class="form-text" placeholder="password" autocomplete="off">
                                <button type="button" class="show"><i class="far fa-eye"></i></button>
                            </div>
                            <div class="password d-flex flex-row align-items-center">
                                <input type="password" name="signup[password-confirm]" class="form-text" placeholder="password confirm" autocomplete="off">
                                <button type="button" class="show"><i class="far fa-eye"></i></button>
                            </div>
                            <button type="submit">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p>&copy; project_0 2020</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- JS FILES -->
    <script src="external/jquery/jquery.js"></script>
    <script src="external/bootstrap4/js/bootstrap.min.js"></script>
    <script src="scripts/main.js"></script>
</body>
</html>