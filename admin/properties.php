<?php
    include_once "../connection.php";
?>
<?php 
    $properties = [];

    try {
        //code...
        $sql = "SELECT P.id as PropertyId, P.name as PropertyName, C.name as CategoryName, P.description, P.address, P.totalPrice, P.area from properties P INNER JOIN categories C ON P.categoryId = C.id";
        
        $results = $conn->query($sql);
    
        if($results->num_rows > 0) {
            while($obj = $results->fetch_object()) {
                array_push($properties, $obj);
            }
        }
    } catch (\Throwable $th) {
        throw $th;
    }
?>
<?php require_once 'nav.php' ?>
<div class="container">
    <?php include_once '../flash_session.php' ?>

    <div class="card mt-5">
        <h5 class="card-header">All Properties</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a href="add_property.php">
                        <button class="btn btn-primary">Add Property</button>
                    </a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Address</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Area</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($properties) > 0) {
                        foreach($properties as $property) {
                            $id = $property->PropertyId;

                        ?>
                        <tr>
                            <th scope="row"><?php echo($id)?></th>
                            <td><?php echo($property->PropertyName)?></td>
                            <td><?php echo($property->CategoryName)?></td>
                            <td><?php echo($property->address)?></td>
                            <td><?php echo($property->totalPrice)?></td>
                            <td><?php echo($property->area)?></td>
                            <td>
                                <a href="property_images.php?id=<?php echo ($id); ?>">
                                    <button type="button" class="btn btn-success p-2">Image</button>
                                </a>
                                <a href="edit_property.php?id=<?php echo ($id); ?>">
                                    <button type="button" class="btn btn-success p-2">Edit</button>
                                </a>
                                <a href="delete_property.php?id=<?php echo ($id); ?>">
                                    <button type="button" class="btn btn-danger p-2">Delete</button>
                                </a>
                            </td>
                        </tr>
                        <?php
                        }}?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once 'footer.php' ?>