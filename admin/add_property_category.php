<?php require_once 'nav.php' ?>
<?php
    $name = $_POST['name'];

    if($name) {
        $sql = "INSERT into categories (name) VALUES ('$name')";
        $result = $conn->query($sql);
        if($result) {
            $_SESSION['flash_message'] = "Category added successfully.";
            $_SESSION['flash_message_level'] = "success";

            header("Location: categories.php");
        }
    }
?>
<div class="container">
    <div class="card mt-5">
        <h5 class="card-header">Add New Property Category</h5>
        <div class="card-body">
            <form action="add_property_category.php" method="post">
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once 'footer.php' ?>