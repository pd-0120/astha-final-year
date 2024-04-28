<?php
    require_once 'connection.php';
    $user = [];
    $user = isset($_SESSION['USER']) ? $_SESSION['USER'] : [];

    $user = $_SESSION["USER"];

    if(isset($user) && $user['isAdmin']) {
        
    } else {
        header("Location: ../index.php");
    }