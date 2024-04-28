<?php 
    require_once 'connection.php';
    
    $firstname  = $_POST['firstname'];
    $lastname   = $_POST['lastname'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $phone      = $_POST['phone'];
    
    if(
        isset($firstname) 
        && isset($lastname)
        && isset($email)
        && isset($password)
        && isset($phone)) {

        $encpassword = md5($password);
    
        $fetch = ""; 
        $sql = "select * from users where email = '$email' LIMIT 1";
    
        try {
            $fetch = $conn->query($sql);   
        } catch (\Throwable $th) {
            throw $th;
        }
    
        if($fetch->num_rows > 0) {
            $_SESSION['flash_message'] = "Email is already exist";
            $_SESSION['flash_message_level'] = "danger";
            
            header("Location: register.php");
        } else {
            $sql = "INSERT into users (firstName, lastName, email, phone, password) VALUES('$firstname', '$lastname', '$email', '$phone', '$encpassword')";
            
            $_SESSION['flash_message'] = "Account has been created successfully";
            $_SESSION['flash_message_level'] = "success";

            header("Location: login.php");

        try {
                $fetch = $conn->query($sql);
                
            } catch (\Throwable $th) {
                $_SESSION['flash_message'] = $th->getMessage();
                $_SESSION['flash_message_level'] = "danger";
                header("Location: register.php");
        }
    
    }
    } else {

        header("Location: register.php");
    }