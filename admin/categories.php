<?php require_once 'nav.php' ?>
<?php 
    $categories = [];
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($obj = $result->fetch_object()) {
            array_push($categories, $obj);
        }
    }
?>
<div class="container">
    <?php include_once '../flash_session.php' ?>

    <div class="card mt-5">
        <h5 class="card-header">All Property categories</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a href="add_property_category.php">
                        <button class="btn btn-primary">Add Property category</button>
                    </a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($categories)  > 0) {
                        foreach($categories as $key => $category) {
                            $name = $category->name;
                            $id = $category->id;
                        ?>
                            <tr>
                                <td><?php echo($id);?></td>
                                <td><?php echo($name);?></td>
                                <td>
                                    <a href="edit_property_category.php?id=<?php echo($id);?>">
                                        <button type="button" class="btn btn-success p-2">Edit</button>
                                    </a>
                                    <a href="delete_property_category.php?id=<?php echo ($id);?>">
                                        <button type="button" class="btn btn-danger p-2">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        <?php    
                        }
                    }?>
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once 'footer.php' ?>