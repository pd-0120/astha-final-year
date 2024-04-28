<?php require_once 'nav.php' ?>
<?php require_once 'connection.php' ?>
<?php 
    
    $id = $_GET['id'];
    if(!$id) {
        header("Location: index.php");
    }
    $images = [];
    $sql = "SELECT * from properties where id=$id";
    $result = $conn->query($sql);
    
    if($result->num_rows == 0) {
        header("Location: index.php");
    }
    
    $property = $result->fetch_object();
    
    $id = $property->id;
    $name = $property->name;
    $description = $property->description;
    $address = $property->address;
    $googleMapAddress = $property->googleMapAddress;
    $totalPrice = $property->totalPrice;
    $area = $property->area;
    $date_created = $property->date_created;
    $image_1 = $property->image_1;
    $image_2 = $property->image_2;
    $image_3 = $property->image_3;
    $image_4 = $property->image_4;
    $image_5 = $property->image_5;

    if(isset($image_1)) {
        array_push($images, $image_1);
    }

    if (isset($image_2)) {
        array_push($images, $image_2);
    }

    if (isset($image_3)) {
        array_push($images, $image_3);
    }


    if (isset($image_4)) {
        array_push($images, $image_4);
    }

    if (isset($image_5)) {
        array_push($images, $image_5);
    }
    /*0 for user who is not logged in yet, 1 for user 
        who is loggedin but not bought the property yet
        and 2 means that, user who is logged in and has bought the property as well.
        */
        
        $usersPropertiesId = 0;
        $is_buy_button  = 0;
        $is_buy_button_text  = "In order to buy, please login first";
        $user = isset($_SESSION['USER']) ? $_SESSION['USER'] : [];
        
        try {
            if(count($user) > 0) {
                $is_buy_button = 1;
                $tenPrPrice = $totalPrice/10;
                $userId = $user['id'];
                $loggedInUserId = $userId;
                $is_buy_button_text = "Buy this property by paying 10% of total price which is $tenPrPrice";
    
                $sql = "SELECT * from usersproperties where userId='$userId' and propertyId='$id'";
    
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    $usersPropertiesId = $result->fetch_object()->id;
                    $is_buy_button = 2;
                }
            }
            //code...
        } catch (\Throwable $th) {
            var_dump($th);
        }

    try {

        $propertiesFeedbacks = [];
    
        $sql = "SELECT * from feedbacks where propertyId='$id'";
        
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($obj = $result->fetch_object()) {
                array_push($propertiesFeedbacks, $obj);
            }
        }
    } catch (\Throwable $th) {
        $_SESSION['flash_message'] = $th->getMessage();
        $_SESSION['flash_message_level'] = "danger";

        header("Location: properties_details.php?id=$id");
    }
?>
<div class="body-wrapper">
    <?php require_once 'header.php' ?>
    <div class="ltn__img-slider-area mb-90">
        <div class="container-fluid">
            <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="<?php echo ($image_1) ?>" >
                            <img src="<?php echo ($image_1) ?> " width="100%" height="auto" alt="Image">
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="<?php echo ($image_2) ?>" >
                            <img src="<?php echo ($image_2) ?>" width="100%" height="auto" alt="Image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="<?php echo ($image_3) ?>" >
                            <img src="<?php echo ($image_3) ?>" width="100%" height="auto" alt="Image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="<?php echo ($image_4) ?>" >
                            <img src="<?php echo ($image_4) ?>" width="100%" height="auto" alt="Image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="<?php echo ($image_5) ?>" >
                            <img src="<?php echo ($image_5) ?>" width="100%" height="auto" alt="Image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="ltn__shop-details-area pb-10">
        <div class="container">
            <?php include_once 'flash_session.php' ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-category">
                                    <a href="#">Featured</a>
                                </li>
                                <li class="ltn__blog-category">
                                    <a class="bg-orange" href="#">For Rent</a>
                                </li>
                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt"></i><?php echo($date_created)?>
                                </li>
                                <li>
                                    <a href="#"><i class="far fa-comments"></i>35 Comments</a>
                                </li>
                            </ul>
                        </div>
                        <h1><?php echo($name)?></h1>
                        <label><span class="ltn__secondary-color"><i class="flaticon-pin"></i></span><?php echo ($address) ?></label>
                        <h4 class="title-2">Description</h4>
                        <p><?php echo ($description) ?></p>

                        <h4 class="title-2">Property Detail</h4>  
                        <div class="property-detail-info-list section-bg-1 clearfix mb-60">                          
                            <ul>
                                <li><label>Property ID:</label> <span><?php echo ($id) ?></span></li>
                                <li><label>Home Area: </label> <span><?php echo ($area) ?> sqft</span></li>
                            </ul>
                            <ul>
                                <li><label>Price:</label> <span><?php echo ($totalPrice) ?></span></li>
                                <li><label>Property Status:</label> <span>For Sale</span></li>
                            </ul>
                        </div>
                                        
                        <!-- <h4 class="title-2">Facts and Features</h4>
                        <div class="property-detail-feature-list clearfix mb-45">                            
                            <ul>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Living Room</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Garage</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Dining Area</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Bedroom</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Bathroom</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Gym Area</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Garden</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Parking</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div> -->

                        <h4 class="title-2 mb-10">Amenities</h4>
                        <div class="property-details-amenities mb-60">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            <li>
                                                <label class="checkbox-item">Air Conditioning
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Gym
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Microwave
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Swimming Pool
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">WiFi
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            <li>
                                                <label class="checkbox-item">Barbeque
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Recreation
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Microwave
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Basketball Cout
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Fireplace
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            <li>
                                                <label class="checkbox-item">Refrigerator
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Window Coverings
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Washer
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">24x7 Security
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Indoor Game
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="title-2">Location</h4>
                        <div class="property-details-google-map mb-60">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9334.271551495209!2d-73.97198251485975!3d40.668170674982946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25b0456b5a2e7%3A0x68bdf865dda0b669!2sBrooklyn%20Botanic%20Garden%20Shop!5e0!3m2!1sen!2sbd!4v1590597267201!5m2!1sen!2sbd" width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        
                        <div class="ltn__shop-details-tab-content-inner--- ltn__shop-details-tab-inner-2 ltn__product-details-review-inner mb-60">
                            <h4 class="title-2">Customer Reviews</h4>
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                    <li class="review-total"> <a href="#"> ( <?php echo(count($propertiesFeedbacks))?> Reviews )</a></li>
                                </ul>
                            </div>
                            <hr>
                            <!-- comment-area -->
                            <div class="ltn__comment-area mb-30">
                                <div class="ltn__comment-inner">
                                    <ul>
                                        <?php 
                                            if(count($propertiesFeedbacks)) {
                                                foreach($propertiesFeedbacks as $propertiesFeedback) {
                                                    $userId = $propertiesFeedback->userId;

                                                        $sql = "SELECT * from users where id='$userId'";
                                                        
                                                        $result = $conn->query($sql);
                                                        $user = $result->fetch_object();
                                                    ?>
                                                        <li>
                                                            <div class="ltn__comment-item clearfix">
                                                                <div class="ltn__commenter-comment">
                                                                    <h6><a href="#"><?php echo($user->firstName." ". $user->lastName);?></a></h6>
                                                                    <div class="product-ratting">
                                                                        <ul>
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <p><?php echo($propertiesFeedback->feedback)?></p>
                                                                    <span class="ltn__comment-reply-btn"><?php echo ($propertiesFeedback->date_created) ?></span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php 
                                                }
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <?php if($is_buy_button == 0){
                                ?>
                                    <div class="btn-wrapper">
                                        <a href="login.php">
                                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="button"><?php echo($is_buy_button_text)?></button>
                                        </a>
                                    </div>
                                <?php 
                            } elseif($is_buy_button == 1) {
                                ?>
                                <div class="btn-wrapper">
                                    <a href="payment.php?id=<?php echo($id)?>">
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="button"><?php echo ($is_buy_button_text) ?></button>
                                    </a>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="ltn__comment-reply-area ltn__form-box mb-30">
                                    <form action="feedback_post.php" method="POST">
                                        <input type="hidden" name="usersPropertiesId" value="<?php echo($usersPropertiesId)?>">
                                        <input type="hidden" name="id" value="<?php echo ($id) ?>">
                                        <input type="hidden" name="userId" value="<?php echo ($loggedInUserId) ?>">
                                        <h4>Add a Review</h4>
                                        
                                        <div class="input-item input-item-textarea ltn__custom-icon">
                                            <textarea placeholder="Type your comments...." name="feedback" required></textarea>
                                        </div>
                                        <div class="btn-wrapper">
                                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <?php
                            }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php' ?>
</div>
<?php include_once 'footer1.php' ?>