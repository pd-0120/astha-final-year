<?php require_once '../connection.php'; ?>

<?php

$id     = $_POST['id'];
$name   = $_POST['name'];
$area   = $_POST['area'];
$categoryId     = $_POST['categoryId'];
$address        = $_POST['address'];
$totalPrice     = $_POST['totalPrice'];
$description    = $_POST['description'];
$googleMapAddress = $_POST['googleMapAddress'];


if (!$id) {
    $_SESSION['flash_message'] = "Can not able to find the property";
    $_SESSION['flash_message_level'] = "danger";

    header('Location: properties.php');
}

$sql = "UPDATE properties set name='$name',area = '$area',categoryId = '$categoryId',address = '$address',totalPrice = '$totalPrice',description = '$description',googleMapAddress = '$googleMapAddress' where id='$id'";

$result = $conn->query($sql);
if ($result) {
    $_SESSION['flash_message'] = "Property updated successfully";
    $_SESSION['flash_message_level'] = "success";

    header('Location: properties.php');
} else {
    $_SESSION['flash_message'] = "Can not able to find the property";
    $_SESSION['flash_message_level'] = "danger";

    header('Location: properties.php');
}