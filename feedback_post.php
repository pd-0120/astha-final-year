<?php
    require_once 'connection.php';

    $usersPropertiesId = $_POST['usersPropertiesId'];
    $id = $_POST['id'];
    $feedback = $_POST['feedback'];
    $userId = $_POST['userId'];

    if(!$usersPropertiesId) {
        $_SESSION['flash_message'] = "Something went wrong";
        $_SESSION['flash_message_level'] = "danger";

        header("Location: properties_details.php?id=$id");
} else {
        $sql = "INSERT into feedbacks(usersPropertiesId, feedback, propertyId, userId) VALUES('$usersPropertiesId', '$feedback', '$id', '$userId')";

        $result = $conn->query($sql);
        
        if($result) {
            $_SESSION['flash_message'] = "Feedback send successfully.";
            $_SESSION['flash_message_level'] = "success";

        header("Location: properties_details.php?id=$id");
    }
}