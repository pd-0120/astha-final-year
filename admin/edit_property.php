<?php require_once 'nav.php' ?>
<?php
$categories = [];

$sql = "SELECT * from categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($obj = $result->fetch_object()) {
        array_push($categories, $obj);
    }
}

    $id = $_GET['id'];
    $property = [];

    $name       = "";
    $description = "";
    $categoryId = "";
    $address    = "";
    $totalPrice = "";
    $area       = "";
    $googleMapAddress = "";
    $sql = "SELECT * from properties where id='$id'";
    
    $result = $conn->query($sql);

    if($result->num_rows == 0) {

        $_SESSION['flash_message'] = "Could not able to find the property";
        $_SESSION['flash_message_level'] = "danger";

        header('Location: properties.php');
    } else {
        $property = $result->fetch_object();
        
        $name       = $property->name;
        $id         = $property->id;
        $name       = $property->name;
        $categoryId = $property->categoryId;
        $address    = $property->address;
        $totalPrice = $property->totalPrice;
        $area       = $property->area;
        $description = $property->description;
        $googleMapAddress = $property->googleMapAddress;
    }
    ?>
<div class="container">
    <div class="card mt-5">
        <h5 class="card-header">Edit <i><?php echo $name?></i> Property</h5>
        <div class="card-body">
            <form action="edit_property_post.php" method="post">
                <input type="hidden" name="id" name="id" value="<?php echo($id)?>"/>
                <div class="row">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name:</label>
                            <input required type="text" class="form-control h-60" name="name" id="name" value="<?php echo($name)?>">
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description:</label>
                            <input required type="text" class="form-control h-60" name="description" id="description" value="<?php echo ($description) ?>">

                        </div>
                        <div class="col-md-6">
                            <label for="categoryId" class="form-label">Property Category:</label>
                            <select name="categoryId" id="categoryId" class="form-control" required>
                                <?php foreach ($categories as $category) {
                                        ?>
                                        <option value="<?php echo ($category->id); ?>" <?php if($category->id == $categoryId){ echo 'selected';} ?> ><?php echo ($category->name); ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address:</label>
                            <input required type="text" class="form-control h-60" name="address" id="address" value="<?php echo ($address) ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="totalPrice" class="form-label">Total Price:</label>
                            <input required type="number" class="form-control h-60" id="totalPrice" name="totalPrice" value="<?php echo ($totalPrice) ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="area" class="form-label">Area:</label>
                            <input required type="number" class="form-control h-60" id="area" name="area" value="<?php echo ($area) ?>">
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success" type="submit">
                                Update Property
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once 'footer.php' ?>