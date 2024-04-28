<?php require_once '../connection.php'; ?>

<?php

$id = $_GET['id'];

$sql = "DELETE from properties where id='$id'";
$result = $conn->query($sql);

if ($result) {
    $_SESSION['flash_message'] = "Property removed successfully.";
    $_SESSION['flash_message_level'] = "success";

    header('Location: properties.php');
} else {
    $_SESSION['flash_message'] = "Can not able to find the Property";
    $_SESSION['flash_message_level'] = "danger";

    header('Location: properties.php');
}