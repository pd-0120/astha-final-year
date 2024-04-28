<?php require_once '../connection.php'; ?>

<?php

$id = $_POST['id'];
$name = $_POST['name'];

if(!$id) {
    $_SESSION['flash_message'] = "Can not able to find the category";
    $_SESSION['flash_message_level'] = "danger";

    header('Location: categories.php');
}

$sql = "UPDATE categories set name='$name' where id='$id'";
var_dump($sql);
$result = $conn->query($sql);
if($result) {
    $_SESSION['flash_message'] = "Category updated successfully";
    $_SESSION['flash_message_level'] = "success";

    header('Location: categories.php');
} else {
    $_SESSION['flash_message'] = "Can not able to find the category";
    $_SESSION['flash_message_level'] = "danger";

    header('Location: categories.php');
}