<?php
    include_once "../connection.php";
?>
<?php
$id = $_POST['id'];

$image_1 = $_FILES['image_1'];
$image_2 = $_FILES['image_2'];
$image_3 = $_FILES['image_3'];
$image_4 = $_FILES['image_4'];
$image_5 = $_FILES['image_5'];
$allowedExtensions = ['jpg', 'png', 'jpeg', 'gif', ''];


if(!isset($id)) {
    header('Location: ../index.php');
}

$target_dir = "../asset/media/";
$db_dire = "asset/media/";

if(
    $image_1['size'] == 0 && 
    $image_2['size'] == 0 && 
    $image_3['size'] == 0 && 
    $image_4['size'] == 0 && 
    $image_5['size'] == 0) {
    $_SESSION['flash_message'] = "Please select atleast one image.";
    $_SESSION['flash_message_level'] = "danger";
    
    header("Location: property_images.php?id=$id");
} else {

    if($image_1['size'] != 0) {
        $temp = explode(".", $image_1["name"]);
        $extension = end($temp);

        if(in_array($extension, $allowedExtensions)) {
            $fileName = uniqid() . "." . $extension;
            $path = $target_dir.$fileName;

            $db_path = $db_dire.$fileName;
            
            try {
                $result = move_uploaded_file($image_1["tmp_name"], $path);
                
                if($result) {
                    $sql = "UPDATE properties set image_1='$db_path' where id='$id'";
                    $conn->query($sql);
                }
            } catch (\Throwable $th) {
            }
        }
    }

    if($image_2['size'] != 0) {
        $temp = explode(".", $image_2["name"]);
        $extension = end($temp);

        if(in_array($extension, $allowedExtensions)) {
            $fileName = uniqid() . "." . $extension;
            $path = $target_dir.$fileName;

            $db_path = $db_dire.$fileName;

            try {
                $result = move_uploaded_file($image_2["tmp_name"], $path);

                if($result) {
                    $sql = "UPDATE properties set image_2='$db_path' where id='$id'";
                    $conn->query($sql);
                }
            } catch (\Throwable $th) {

            }
        }
    }

    if($image_3['size'] != 0) {
        $temp = explode(".", $image_3["name"]);
        $extension = end($temp);

        if(in_array($extension, $allowedExtensions)) {
            $fileName = uniqid() . "." . $extension;
            $path = $target_dir.$fileName;

            $db_path = $db_dire.$fileName;

            try {
                $result = move_uploaded_file($image_3["tmp_name"], $path);

                if($result) {
                    $sql = "UPDATE properties set image_3='$db_path' where id='$id'";
                    $conn->query($sql);
                }
            } catch (\Throwable $th) {

            }
        }
    }

    if($image_4['size'] != 0) {
        $temp = explode(".", $image_4["name"]);
        $extension = end($temp);

        if(in_array($extension, $allowedExtensions)) {
            $fileName = uniqid() . "." . $extension;
            $path = $target_dir.$fileName;

            $db_path = $db_dire.$fileName;

            try {
                $result = move_uploaded_file($image_4["tmp_name"], $path);
                
                if($result) {
                    $sql = "UPDATE properties set image_4='$db_path' where id='$id'";
                    $conn->query($sql);
                }
            } catch (\Throwable $th) {

            }
        }
    }

    if($image_5['size'] != 0) {
        $temp = explode(".", $image_5["name"]);
        $extension = end($temp);

        if(in_array($extension, $allowedExtensions)) {
            $fileName = uniqid() . "." . $extension;
            $path = $target_dir.$fileName;

            $db_path = $db_dire.$fileName;

            try {
                $result = move_uploaded_file($image_5["tmp_name"], $path);

                if($result) {
                    $sql = "UPDATE properties set image_5='$db_path' where id='$id'";
                    $conn->query($sql);
                }
            } catch (\Throwable $th) {

            }
        }
    }

    $_SESSION['flash_message'] = "Images has been uploaded successfully.";
    $_SESSION['flash_message_level'] = "success";

    header("Location: properties.php");
}

try {

} catch (\Throwable $th) {
    throw $th;
}