<?php require_once '../connection.php'; ?>

<?php

$id = $_GET['id'];

$sql = "DELETE from categories where id='$id'";
$result = $conn->query($sql);

if($result) {
    $_SESSION['flash_message'] = "Category removed successfully.";
    $_SESSION['flash_message_level'] = "success";

    header('Location: categories.php');
} else {
    $_SESSION['flash_message'] = "Can not able to find the category";
    $_SESSION['flash_message_level'] = "danger";

    header('Location: categories.php');
}