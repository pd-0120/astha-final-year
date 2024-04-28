<?php
include_once "../connection.php";
?>
<?php
$payment = [];

try {
    $sql = "SELECT * from payment";

    $results = $conn->query($sql);

    if ($results->num_rows > 0) {
        while ($obj = $results->fetch_object()) {
            array_push($payment, $obj);
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
        <h5 class="card-header">Payment</h5>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Transaction Id</th>
                        <th scope="col">Transction Type</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Property</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($payment) > 0) {
                        foreach ($payment as $pay) {
                                $usersPropertiesId = $pay->usersPropertiesId;
                                $sql = "select * from usersProperties where id = $usersPropertiesId LIMIT 1";
                                try {
                                    //code...
                                    $result =  $conn->query($sql);
                                    $usersProperty = $result->fetch_object();
                                    
                                    $sql = "select * from users where id = $usersProperty->userId limit 1";
                                    $sql1 = "select * from properties where id = $usersProperty->propertyId limit 1";
                                    
                                    $user = $conn->query($sql)->fetch_object();
                                    $property = $conn->query($sql1)->fetch_object();
                                } catch (\Throwable $th) {
                                    var_dump($th);
                                }

                            ?>
                                <tr>
                                    <td><?php echo ($pay->id) ?></td>
                                    <td><?php echo ($pay->transactionId) ?></td>
                                    <td><?php echo ($pay->transctionType) ?></td>
                                    <td><?php echo ($pay->amount) ?></td>
                                    <td><?php echo ($user->firstName. " ". $user->lastName) ?></td>
                                    <td><?php echo ($property->name) ?></td>
                                </tr>
                            <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once 'footer.php' ?>