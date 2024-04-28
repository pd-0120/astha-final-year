<?php require_once 'nav.php' ?>
<?php require_once 'connection.php' ?>
<?php


    $properties = [];
    $categories = [];
    $categoryId = isset($_GET['categoryId']) ? $_GET['categoryId'] : NULL;

    try {
        $sql = "SELECT * from categories";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0) {
            while($obj = $result->fetch_object()) {
                array_push($categories, $obj);
            }
        }
    } catch (\Throwable $th) {
        // var_dump($th);
    }
    try {
        if(empty($categoryId)) {
            $sql = "SELECT * from properties";
        } else {
            $sql = "SELECT * from properties where categoryId IN ('$categoryId')";
    }
    
        $result = $conn->query($sql);
        
        if($result->num_rows > 0) {
            while($obj = $result->fetch_object()) {
                array_push($properties, $obj);
            }
        }
    } catch (\Throwable $th) {
        var_dump($th);
        throw $th;
    }
    
?>
<div class="body-wrapper">
    <?php require_once 'header.php' ?>
    <div class="ltn__product-area ltn__product-gutter mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__product-tab-content-inner ltn__product-list-view">
                        <div class="row">
                            <?php if(count($properties) > 0) {
                                foreach($properties as $property) {
                                        $id = $property->id;
                                        $name = $property->name;
                                        $description = $property->description;
                                        $address = $property->address;
                                        $area = $property->area;
                                        $totalPrice = $property->totalPrice;
                                        $image_1 = $property->image_1;

                                    ?>
                                        <div class="col-lg-12">
                                            <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
                                                <div class="product-img">
                                                    <a href="properties_details.php?id=<?php echo($id)?>"><img src="<?php echo($image_1) ?>" alt="#" width="100%" height="auto"></a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="product-badge-price">
                                                        <div class="product-badge">
                                                            <ul>
                                                                <li class="sale-badg">For Rent</li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>RS <?php echo ($totalPrice) ?><label>/Month</label></span>
                                                        </div>
                                                    </div>
                                                    <h2 class="product-title"><a href="properties_details.php?id=<?php echo ($id) ?>"><?php echo ($name) ?></a></h2>
                                                    <div class="product-img-location">
                                                        <ul>
                                                            <li>
                                                                <a href="#"><i class="flaticon-pin"></i> <?php echo ($address) ?></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                        <li><span><?php echo ($area) ?> </span>
                                                            Square Ft
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-info-bottom">
                                                    <div class="product-hover-action">
                                                        <ul>
                                                            <li>
                                                                <a href="properties_details.php?id=<?php echo ($id) ?>" title="Product Details">
                                                                    <i class="flaticon-add"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php 
                                }
                            }?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <h3 class="mb-10">Categories</h3>
                        <!-- Advance Information widget -->
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title">Categories</h4>
                            <ul>
                                <?php 
                                    if(count($categories) > 0) {
                                        foreach($categories as $category) {
                                            ?>
                                                <li>
                                                    <label class="checkbox-item"><?php echo($category->name)?>
                                                        <input type="checkbox" name="category[<?php echo ($category->id) ?>]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <span class="categorey-no">3,924</span>
                                                </li>
                                            <?php 
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php' ?>
</div>
<?php include_once 'footer1.php' ?>