<?php

    session_start();

    // SIGNIN
    function signin($signin_form_data) {
        // connect to db
        require_once "./connect.php";

        // data
        $username = $signin_form_data['username'];
        $password = $signin_form_data['password'];

        // user password
        $user = mysqli_query($connect, "SELECT `password` FROM `users` WHERE `username` = '$username'");
        $user_password_hash =  mysqli_fetch_assoc($user)['password'];

        if (mysqli_num_rows($user) > 0 && password_verify($password, $user_password_hash)) {
            $user = mysqli_query($connect, "SELECT * FROM `users` WHERE `username` = '$username'");
            $user = mysqli_fetch_assoc($user);

            $_SESSION['user'] = [
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email']
            ];

            header("Location: profile.php");
        } else {
            $_SESSION['signin-error-message'] = 'Wrong username or password';
            header("Location: ../index.php");
        }
    }

    // SIGNUP
    function signup($signup_form_data) {
        // connect to db
        require_once "./connect.php";

        // data
        $name = $signup_form_data['name'];
        $username = $signup_form_data['username'];
        $email = $signup_form_data['email'];
        $password = password_hash($signup_form_data['password'], PASSWORD_BCRYPT);

        // checking by username
        $existing_users_query_result = mysqli_query($connect, "SELECT * FROM `users` WHERE `username` = '$username'");

        // do signup or show error message
        if (mysqli_num_rows($existing_users_query_result) == 0) {
            $query = "INSERT INTO `users`(`id`, `name`, `username`, `email`, `password`) VALUES (NULL, '$name', '$username', '$email', '$password')";
        
            $res = mysqli_query($connect, $query);

            // add user in section
            $_SESSION['user'] = [
                'name' => $name,
                'username' => $username,
                'email' => $email
            ];

            // redirect to profile.php
            header("Location: profile.php");
        } else {
            $_SESSION['signup-error-message'] = "A user with this username already exists";
            header("Location: ../index.php");
        }
    }