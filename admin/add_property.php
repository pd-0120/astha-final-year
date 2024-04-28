<?php require_once 'nav.php' ?>
<?php 
    $categories = [];

    $sql = "SELECT * from categories";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        while($obj = $result->fetch_object()) {
            array_push($categories, $obj);
        }
    }
?>
<div class="container">
    <div class="card mt-5">
        <h5 class="card-header">Add New Property</h5>
        <div class="card-body">
            <form action="add_property_post.php" method="post">
                <div class="row">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name:</label>
                            <input required type="text" class="form-control h-60" name="name" id="name">
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description:</label>
                            <input required type="text" class="form-control h-60" name="description" id="description">

                        </div>
                        <div class="col-md-6">
                            <label for="categoryId" class="form-label">Property Category:</label>
                            <select name="categoryId" id="categoryId" class="form-control" required>
                                <?php foreach($categories as $category) {
                                    var_dump($category)
                                ?>
                                    <option value="<?php echo($category->id);?>"><?php echo($category->name);?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address:</label>
                            <input required type="text" class="form-control h-60" name="address" id="address">
                        </div>
                        <div class="col-md-6">
                            <label for="totalPrice" class="form-label">Total Price:</label>
                            <input required type="number" class="form-control h-60" id="totalPrice" name="totalPrice">
                        </div>

                        <div class="col-md-6">
                            <label for="area" class="form-label">Area:</label>
                            <input required type="number" class="form-control h-60" id="area" name="area">
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success" type="submit">
                                Add Property
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once 'footer.php' ?>