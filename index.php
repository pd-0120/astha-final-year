<?php require_once 'nav.php' ?>
<?php require_once 'connection.php' ?>

<?php 
    $properties = [];
    $feedbacks = [];

    try {
        $sql = "SELECT P.id as PropertyId, P.name as PropertyName, P.image_1, C.name as CategoryName, P.description, P.address, P.totalPrice, P.area from properties P INNER JOIN categories C ON P.categoryId = C.id limit 4";
            
        $results = $conn->query($sql);
    
        if($results->num_rows > 0) {
            while($obj = $results->fetch_object()) {
                array_push($properties, $obj);
            }
        }
        $categories = [];

        $sql = "SELECT * from categories limit 4";
        $results = $conn->query($sql);

        if ($results->num_rows > 0) {
            while ($obj = $results->fetch_object()) {
                array_push($categories, $obj);
            }
        }

        $sql = "SELECT * from feedbacks limit 10";
        $results = $conn->query($sql);

        if ($results->num_rows > 0) {
            while ($obj = $results->fetch_object()) {
                array_push($feedbacks, $obj);
            }
        }

    } catch (\Throwable $th) {
        throw $th;
    }
?>
<div class="body-wrapper">

    <?php require_once 'header.php' ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php include_once 'flash_session.php' ?>
            </div>
        </div>
    </div>
    <div class="ltn__about-us-area pt-120 pb-90 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2--- mb-20">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">About Us</h6>
                            <h1 class="section-title">The Leading Real Estate
                                Rental Marketplace<span>.</span></h1>
                            <p>Over 39,000 people work for us in more than 70 countries all over the
                                This breadth of global coverage, combined with specialist services</p>
                        </div>
                        <ul class="ltn__list-item-half clearfix">
                            <li>
                                <i class="flaticon-home-2"></i>
                                Smart Home Design
                            </li>
                            <li>
                                <i class="flaticon-mountain"></i>
                                Beautiful Scene Around
                            </li>
                            <li>
                                <i class="flaticon-heart"></i>
                                Exceptional Lifestyle
                            </li>
                            <li>
                                <i class="flaticon-secure"></i>
                                Complete 24/7 Security
                            </li>
                        </ul>
                        <div class="ltn__callout bg-overlay-theme-05  mt-30">
                            <p>"Enimad minim veniam quis nostrud exercitation <br>
                                llamco laboris. Lorem ipsum dolor sit amet" </p>
                        </div>
                        <div class="btn-wrapper animated">
                            <a href="#" class="theme-btn-1 btn btn-effect-1">OUR SERVICES</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ltn__counterup-area section-bg-1 pt-120 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 align-self-center">
                    <div class="ltn__counterup-item text-color-white---">
                        <div class="counter-icon">
                            <i class="flaticon-select"></i>
                        </div>
                        <h1><span class="counter">560</span><span class="counterUp-icon">+</span> </h1>
                        <h6>Total Area Sq</h6>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 align-self-center">
                    <div class="ltn__counterup-item text-color-white---">
                        <div class="counter-icon">
                            <i class="flaticon-office"></i>
                        </div>
                        <h1><span class="counter">197</span><span class="counterUp-letter">K</span><span class="counterUp-icon">+</span> </h1>
                        <h6>Apartments Sold</h6>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 align-self-center">
                    <div class="ltn__counterup-item text-color-white---">
                        <div class="counter-icon">
                            <i class="flaticon-excavator"></i>
                        </div>
                        <h1><span class="counter">268</span><span class="counterUp-icon">+</span> </h1>
                        <h6>Total Constructions</h6>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 align-self-center">
                    <div class="ltn__counterup-item text-color-white---">
                        <div class="counter-icon">
                            <i class="flaticon-armchair"></i>
                        </div>
                        <h1><span class="counter">340</span><span class="counterUp-icon">+</span> </h1>
                        <h6>Apartio Rooms</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ltn__about-us-area pt-120 pb-90 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2--- mb-30">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">About Us</h6>
                            <h1 class="section-title">Today Sells Properties</h1>
                            <p>Houzez allow you to design unlimited panels and real estate custom
                                forms to capture leads and keep record of all information</p>
                        </div>
                        <ul class="ltn__list-item-1 ltn__list-item-1-before clearfix">
                            <li> Live Music Cocerts at Luviana</li>
                            <li>Our SecretIsland Boat Tour is Just for You</li>
                            <li>Live Music Cocerts at Luviana</li>
                            <li>Live Music Cocerts at Luviana</li>
                        </ul>
                        <ul class="ltn__list-item-2 ltn__list-item-2-before ltn__flat-info">
                            <li><span>3 <i class="flaticon-bed"></i></span>
                                Bedrooms
                            </li>
                            <li><span>2 <i class="flaticon-clean"></i></span>
                                Bathrooms
                            </li>
                            <li><span>2 <i class="flaticon-car"></i></span>
                                Car parking
                            </li>
                            <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                square Ft
                            </li>
                        </ul>
                        <ul class="ltn__list-item-2 ltn__list-item-2-before--- ltn__list-item-2-img mb-50">
                            <li>
                                <a href="img/img-slide/11.jpg" data-rel="lightcase:myCollection">
                                    <img src="img/img-slide/11.jpg" alt="Image">
                                </a>
                            </li>
                            <li>
                                <a href="img/img-slide/12.jpg" data-rel="lightcase:myCollection">
                                    <img src="img/img-slide/12.jpg" alt="Image">
                                </a>
                            </li>
                            <li>
                                <a href="img/img-slide/13.jpg" data-rel="lightcase:myCollection">
                                    <img src="img/img-slide/13.jpg" alt="Image">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-right">
                        <img src="https://thankyoure.s3.ap-southeast-2.amazonaws.com/2020/06/Monochromatic-Just-Sold-Real-Estate-Social-Media-Graphic-x.png" alt="About Us Image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ltn__feature-area section-bg-1 pt-120 pb-90 mb-120---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Our Services</h6>
                        <h1 class="section-title">Our Main Focus</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__custom-gutter--- justify-content-center">
                <?php
                    if(count($categories) > 0) {
                        foreach($categories as $category) {
                            $link = "properties.php?categoryId=$category->id"; 
                            ?>
                                <div class="col-lg-3 col-lg-4 col-sm-6 col-12">
                                    <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                                        <div class="ltn__feature-icon">
                                            <span><i class="flaticon-house"></i></span>
                                        </div>
                                        <div class="ltn__feature-info">
                                            <h3><a href="<?php echo($link);?>">Buy a <?php echo($category->name);?></a></h3>
                                            <p>over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.</p>
                                            <a class="ltn__service-btn" href="<?php echo($link);?>">Find A <?php echo ($category->name); ?> <i class="flaticon-right-arrow"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    } 
                ?>
            </div>
        </div>
    </div>
    
    <div class="ltn__product-slider-area ltn__product-gutter pt-115 pb-90 plr--7">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Properties</h6>
                        <h1 class="section-title">Featured Listings</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__product-slider-item-four-active-full-width slick-arrow-1">
                <?php 
                    if(count($properties) > 0) {
                        foreach($properties as $property) {
                            $id = $property->PropertyId;
                            $name = $property->PropertyName;
                            $description = $property->description;
                            $CategoryName = $property->CategoryName;
                            $address = $property->address;
                            $totalPrice = $property->totalPrice;
                            $area = $property->area;
                            $image_1 = $property->image_1;

                            ?>
                                <div class="col-lg-3">
                                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                                        <div class="product-img">
                                            <a href="properties_details.php?id=<?php echo $id?>"><img src="<?php echo ($image_1) ?>" alt="#" width="100%" height="auto"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge bg-green">For Sale</li>
                                                </ul>
                                            </div>
                                            <div class="product-img-location-gallery">
                                                <div class="product-img-location">
                                                    <ul>
                                                        <li>
                                                            <a href="#"><i class="flaticon-pin"></i> <?php echo($address)?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-img-gallery">
                                                    <ul>
                                                        <li>
                                                            <a href="properties_details.php?id=<?php echo $id?>"><i class="fas fa-camera"></i> 4</a>
                                                        </li>
                                                        <li>
                                                            <a href="properties_details.php?id=<?php echo $id?>"><i class="fas fa-film"></i> 2</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-price">
                                                <span>RS <?php echo($totalPrice)?><label>/Month</label></span>
                                            </div>
                                            <h2 class="product-title"><a href="properties_details.php?id=<?php echo $id?>"><?php echo($name)?></a></h2>
                                            <div class="product-description">
                                                <p><?php echo ($description) ?></p>
                                            </div>
                                            <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                                <li><span><?php echo ($area) ?> <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                                    square Ft
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-info-bottom">
                                            <div class="real-estate-agent">
                                                <div class="agent-img">
                                                    <a href="#"><img src="https://0.gravatar.com/avatar/22bd03ace6f176bfe0c593650bcf45d8" alt="#"></a>
                                                </div>
                                                <div class="agent-brief">
                                                    <h6><a href="#">Astha Suthar</a></h6>
                                                    <small>Estate Agents</small>
                                                </div>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                            <i class="flaticon-expand"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                            <i class="flaticon-heart-1"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="properties_details.php?id=<?php echo $id?>" title="Product Details">
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
                    }
                ?>

            </div>
        </div>
    </div>

    <div class="ltn__category-area section-bg-1-- ltn__primary-bg before-bg-1 bg-image bg-overlay-theme-black-5--0 pt-115 pb-90 d-none" data-bs-bg="img/bg/5.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title white-color">Top Categories</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__category-slider-active slick-arrow-1">
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="properties.php">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="properties.php">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="properties.php"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="properties.php">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="properties.php">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="properties.php"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="properties.php">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="properties.php">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="properties.php"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="properties.php">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="properties.php">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="properties.php"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="properties.php">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="properties.php">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="properties.php"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="properties.php">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="properties.php">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="properties.php"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="ltn__category-area ltn__product-gutter section-bg-1--- pt-115 pb-90 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Our Aminities</h6>
                        <h1 class="section-title">Building Aminities</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__category-slider-active--- slick-arrow-1 justify-content-center">
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="properties.php">
                            <span class="category-icon"><i class="flaticon-car"></i></span>
                            <span class="category-title">Parking Space</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="properties.php">
                            <span class="category-icon"><i class="flaticon-swimming"></i></span>
                            <span class="category-title">Swimming Pool</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="properties.php">
                            <span class="category-icon"><i class="flaticon-secure-shield"></i></span>
                            <span class="category-title">Private Security</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="properties.php">
                            <span class="category-icon"><i class="flaticon-stethoscope"></i></span>
                            <span class="category-title">Medical Center</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="properties.php">
                            <span class="category-icon"><i class="flaticon-book"></i></span>
                            <span class="category-title">Library Area</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="properties.php">
                            <span class="category-icon"><i class="flaticon-bed-1"></i></span>
                            <span class="category-title">King Size Beds</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="properties.php">
                            <span class="category-icon"><i class="flaticon-home-2"></i></span>
                            <span class="category-title">Smart Homes</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="properties.php">
                            <span class="category-icon"><i class="flaticon-slider"></i></span>
                            <span class="category-title">Kid’s Playland</span>
                            <span class="category-btn"><i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="ltn__testimonial-area section-bg-1--- bg-image-top pt-115 pb-70" data-bs-bg="img/bg/20.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Our Testimonial</h6>
                        <h1 class="section-title">Clients Feedback</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__testimonial-slider-5-active slick-arrow-1">
                <?php
                if(count($feedbacks) > 0) {
                    foreach ($feedbacks as $feedback) {
                        $sql = "SELECT * from users where id='$feedback->userId'";
                        $result = $conn->query($sql);
                        $user = $result->fetch_object();
                        
                        ?>       
                            <div class="col-lg-4">
                                <div class="ltn__testimonial-item ltn__testimonial-item-7">
                                    <div class="ltn__testimoni-info">
                                        <p><i class="flaticon-left-quote-1"></i><?php echo($feedback->feedback)?></p>
                                        <div class="ltn__testimoni-info-inner">
                                            <div class="ltn__testimoni-img">
                                                <img src="https://0.gravatar.com/avatar/22bd03ace6f176bfe0c593650bcf45d8" alt="#">
                                            </div>
                                            <div class="ltn__testimoni-name-designation">
                                                <h5><?php echo($user->firstName. " ". $user->lastName)?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                    }
                } 
                ?>

                <!--  -->
            </div>
        </div>
    </div>
    
    <div class="ltn__brand-logo-area ltn__brand-logo-1 section-bg-1 pt-290 pb-110 plr--9 d-none">
        <div class="container-fluid">
            <div class="row ltn__brand-logo-active">
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="img/brand-logo/1.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="img/brand-logo/2.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="img/brand-logo/3.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="img/brand-logo/4.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="img/brand-logo/5.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="img/brand-logo/3.png" alt="Brand Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BRAND LOGO AREA END -->

    <?php include_once 'footer.php' ?>
</div>
<?php include_once 'footer1.php' ?>
    