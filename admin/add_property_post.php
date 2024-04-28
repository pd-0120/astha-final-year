<?php require_once '../connection.php'; ?>
<?php 
    $name           = $_POST['name'];
    $description    = $_POST['description'];
    $categoryId     = $_POST['categoryId'];
    $address        = $_POST['address'];
    $googleMapAddress = $_POST['googleMapAddress'] ?? null;
    $totalPrice     = $_POST['totalPrice'];
    $area           = $_POST['area'];

    if($name) {
        try {
            $sql = "INSERT into properties (name,description,categoryId,address,googleMapAddress,	totalPrice,area) VALUES ('$name', '$description', '$categoryId', '$address', '$googleMapAddress', '$totalPrice','$area')";

            $result = $conn->query($sql);
            if($result) {
                $_SESSION['flash_message'] = "Property added successfully.";
                $_SESSION['flash_message_level'] = "success";
                
                    header('Location: properties.php');

            } else {
                $_SESSION['flash_message'] = "Something went wrong";
                $_SESSION['flash_message_level'] = "danger";

                    header('Location: properties.php');
            }

        } catch (\Throwable $th) {
            $_SESSION['flash_message'] = $th->getMessage();
            $_SESSION['flash_message_level'] = "danger";

                header('Location: properties.php');
        }
    } else {
        $_SESSION['flash_message'] = "Please fill all the data.";
        $_SESSION['flash_message_level'] = "danger";

            header('Location: properties.php');
    }
?>