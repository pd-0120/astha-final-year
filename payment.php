<?php require_once 'nav.php' ?>
<?php require_once 'connection.php' ?>
<?php 
    $id = $_GET['id'];
    $user = $_SESSION['USER'];
    
    if(!$id || !$user) {
        header("Location: index.php");
    }

    $sql = "SELECT * from properties where id='$id'";
    $result = $conn->query($sql);

    if($result->num_rows == 0) {
        header("Location: index.php");
    }

    $property = $result->fetch_object();
    $totalPrice = $property->totalPrice;
    $tenPrPrice = $totalPrice / 10;
    $userId = $user['id'];

?>
<div class="body-wrapper">
    <?php require_once 'header.php' ?>
    <div class="text-left bg-overlay-white-30 bg-image ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">Process payment for <i><?php echo ($property->name) ?></i></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="payment_post.php" method="post">
        <input type="hidden" name="userId" value="<?php echo($userId)?>" >
        <input type="hidden" name="id" value="<?php echo ($id) ?>" >
        <input type="hidden" name="tenPrPrice" value="<?php echo($tenPrPrice)?>">
        <div class="ltn__checkout-area mb-105">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ltn__checkout-payment-method mt-50">
                            <h4 class="title-2">Payment Method</h4>
                            <div id="checkout_accordion_1">
                                <!-- card -->
                                <div class="card">
                                    <h5 class="ltn__card-title collapsed" data-bs-toggle="collapse" data-bs-target="#faq-item-2-1" aria-expanded="false">
                                        Check payments
                                    </h5>
                                    <div id="faq-item-2-1" class="collapse" data-bs-parent="#checkout_accordion_1" style="">
                                        <div class="card-body">
                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- card -->
                                <div class="card">
                                    <h5 class="ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-2" aria-expanded="true"> 
                                        Cash Payment 
                                    </h5>
                                    <div id="faq-item-2-2" class="collapse show" data-bs-parent="#checkout_accordion_1" style="">
                                        <div class="card-body">
                                            <p>Pay with cash.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ltn__payment-note mt-30 mb-30">
                                <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                            </div>
                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Place order</button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping-cart-total mt-50">
                            <h4 class="title-2">Cart Totals</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><?php echo ($property->name) ?> <strong>× 1</strong></td>
                                        <td><?php echo ($totalPrice) ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Order Total</strong></td>
                                        <td><strong><?php echo ($tenPrPrice) ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php include_once 'footer.php' ?>
</div>
<?php include_once 'footer1.php' ?>