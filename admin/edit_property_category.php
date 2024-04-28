<?php require_once 'nav.php'; ?>
<?php

$id = $_GET['id'];
$category = [];

$sql = "SELECT * from categories where id='$id'";
$result = $conn->query($sql);

if($result->num_rows == 0) {

    $_SESSION['flash_message'] = "Can not able to find the category";
    $_SESSION['flash_message_level'] = "danger";

    header('Location: categories.php');
} else {
    $category = $result->fetch_object();
}
?>

<div class="container">
    <div class="card mt-5">
        <h5 class="card-header">Update Property Category</h5>
        <div class="card-body">
            <form action="update_property_category_post.php" method="post">
                <input type="hidden" name="id" value="<?php echo ($category->id) ?>">
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required value="<?php echo($category->name)?>">
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