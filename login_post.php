
<?php
    require_once 'connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $encPassword = md5($_POST['password']);
    $redrectpage = "properties.php";
    
    try {
        
        $sql = "select * from users where email='$email' and password='$encPassword'";
        
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $user = $result->fetch_array();
            $_SESSION['USER'] = $user;
            
            if($user['isAdmin']) {
                header("Location: ./admin/admin_dashboard.php");
            } else {
                header("Location: $redrectpage");
            }
            
        } else {
            $_SESSION['flash_message'] = "User does not exits";
            $_SESSION['flash_message_level'] = "danger";

            header("Location: login.php");
    }
    } catch (\Throwable $th) {
        var_dump($th);
    }    