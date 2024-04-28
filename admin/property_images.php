<?php
include_once "../connection.php";
?>
<?php
$id = $_GET['id'];
if (!isset($id)) {
    header('Location: index.php');
}
try {

} catch (\Throwable $th) {
    throw $th;
}
?>
<?php require_once 'nav.php' ?>
<div class="container">
    <?php include_once '../flash_session.php' ?>

    <div class="card mt-5">
        <h5 class="card-header">Properties Images</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="property_images_post.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo ($id) ?>">
                        <div class="row">
                            <div class="row form-group">

                                <div class="col-md-3 mb-2">
                                    <label for="image" class="form-label">Property Image 1:</label>
                                    <input type="file" class="form-control h-60" name="image_1" id="image_1">
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label for="image" class="form-label">Property Image 2:</label>
                                    <input type="file" class="form-control h-60" name="image_2" id="image_2">
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label for="image" class="form-label">Property Image 3:</label>
                                    <input type="file" class="form-control h-60" name="image_3" id="image_3">
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label for="image" class="form-label">Property Image 4:</label>
                                    <input type="file" class="form-control h-60" name="image_4" id="image_4">
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label for="image" class="form-label">Property Image 5:</label>
                                    <input type="file" class="form-control h-60" name="image_5" id="image_5">
                                </div>

                                <div class="col-md-12">
                                    <button class="btn btn-success" type="submit">
                                        Upload Image
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php' ?>