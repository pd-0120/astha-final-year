<?php
    require_once 'connection.php';
    
    $userId = $_POST['userId'];
    $id = $_POST['id'];
    $tenPrPrice = $_POST['tenPrPrice'];
    
    try {
        $sql = "INSERT into usersProperties(userId, propertyId) VALUES('$userId', '$id')";
        $result = $conn->query($sql);
        
        if($result) {
            $sql = "SELECT * from  usersProperties where userId='$userId' and propertyId='$id'";
            $result = $conn->query($sql);

            $userPayment = $result->fetch_object();
            $transactionId = rand(100000000000, 9999999999999999);
            $transctionType = "Cash On Delivery";
            $amount = $tenPrPrice;
            $usersPropertiesId = $userPayment->id;

            $sql = "INSERT into payment(transactionId, transctionType, amount, usersPropertiesId) VALUES('$transactionId', '$transctionType', '$amount', '$usersPropertiesId')";
            
            $result = $conn->query($sql);

            if($result) {
                $_SESSION['flash_message'] = "You have bought the property successfully. Please visit our branch to finalise the process. Also we will appreciate feedback. Thanks ";
                $_SESSION['flash_message_level'] = "success";

                header("Location: properties_details.php?id=$id");
                
            } else {
                $_SESSION['flash_message'] = "Something went wrong";
                $_SESSION['flash_message_level'] = "danger";
                
                header("Location: properties_details.php?id=$id");

            }
        } else {
            $_SESSION['flash_message'] = "Something went wrong";
                $_SESSION['flash_message_level'] = "danger";

                header("Location: properties_details.php?id=$id");

        }
    } catch (\Throwable $th) {
        $_SESSION['flash_message'] = $th->getMessage();
        $_SESSION['flash_message_level'] = "danger";
        
        header("Location: properties_details.php?id=$id");

    }

