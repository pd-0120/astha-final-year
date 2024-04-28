<?php require_once 'nav.php' ?>
<?php 
    $totalProperties = 0;
    $totalPropertiesBought = 0;
    $totalPropertiesCategories = 0;
    $totalUsers = 0;
    $totalQueries = 0;

    $sql = "SELECT count(*) from properties";
    $totalProperties = $conn->query($sql)->fetch_array()[0];

    $sql = "SELECT count(*) from usersProperties";
    $totalPropertiesBought = $conn->query($sql)->fetch_array()[0];
    
    $sql = "SELECT count(*) from categories";
    $totalPropertiesCategories = $conn->query($sql)->fetch_array()[0];
    
    $sql = "SELECT count(*) from users";
    $totalUsers = $conn->query($sql)->fetch_array()[0];
    
    $sql = "SELECT count(*) from contactUs";
    $totalQueries = $conn->query($sql)->fetch_array()[0];

?>
<div class="container">
    <div class="mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-bg-1">
                    <div class="card-body">
                        <a href="properties.php"><div class="lead fw-bold">Total Properties</div></a>
                        <h2 class="card-title"><?php echo($totalProperties)?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-bg-2">
                    <div class="card-body">
                        <a href="payment.php">
                            <div class="lead fw-bold">Total Properties Bought</div>
                        </a>
                        <h2 class="card-title"><?php echo ($totalPropertiesBought) ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-bg-3">
                    <div class="card-body">
                        <a href="categories.php">
                            <div class="lead fw-bold">Total Property Categories</div>
                        </a>
                        <h2 class="card-title"><?php echo ($totalPropertiesCategories) ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card card-bg-4 b-2">
                    <div class="card-body">
                        <a href="users.php">
                            <div class="lead fw-bold">Total Users</div>
                            <h2 class="card-title"><?php echo ($totalUsers) ?></h2>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-bg-6">
                    <div class="card-body">
                        <a href="contact_us.php">
                            <div class="lead fw-bold">Total Queries</div>
                            <h2 class="card-title"><?php echo ($totalQueries) ?></h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php' ?>