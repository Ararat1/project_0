<?php

if (!empty($_SESSION['user'])) {
    header("Location: profile.php");
}

if (empty($_POST['signin']) and empty($_POST['signup'])) {
    header("Location: ../index.php");
}

// signin and signup functions
require_once 'functions.php';

// signin
if (!empty($_POST['signin'])) {
    signin($_POST['signin']);
}

// signup
if (!empty($_POST['signup'])) {
    signup($_POST['signup']);
}