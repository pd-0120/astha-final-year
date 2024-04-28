<?php
require_once 'connection.php';

$name   = $_POST['name'];
$email  = $_POST['email'];
$query  = $_POST['query'];
$contactNumber = $_POST['contactNumber'];
session_start();
if($name && $email && $query && $contactNumber) {
    $sql = "INSERT into contactUs(name, email, query, contactNumber) VALUES('$name', '$email', '$query', '$contactNumber')";
    
    try {
        $result = $conn->query($sql);

        if($result) {
            $_SESSION['flash_message'] = "Your message has been sent successfully.";
            $_SESSION['flash_message_level'] = "success";

            header('Location: contact.php');

        } else {
            $_SESSION['flash_message'] = "Something went wrong.";
            $_SESSION['flash_message_level'] = "danger";

            header('Location: contact.php');
        }
    } catch (\Throwable $th) {
        $_SESSION['flash_message'] = $th->getMessage();
        $_SESSION['flash_message_level'] = "danger";

        header('Location: contact.php');
    }

} else {
    $_SESSION['flash_message'] = "Please make sure that you have filled all the fields properly";
    $_SESSION['flash_message_level'] = "danger";
    
    header('Location: contact.php');
}