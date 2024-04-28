<?php
session_start();

$user = $_SESSION['USER'];

if(isset($user)) {
    unset($_SESSION['USER']);

    $_SESSION['flash_message'] = "User has been logged out successfully.";
    $_SESSION['flash_message_level'] = "success";

    header("Location: index.php");
} else {
    $_SESSION['flash_message'] = "Please login first";
    $_SESSION['flash_message_level'] = "danger";

    header("Location: login.php");
}