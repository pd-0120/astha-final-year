<?php
include_once "../connection.php";
?>
<?php
$users = [];

try {
    //code...
    $sql = "SELECT * from users";

    $results = $conn->query($sql);

    if ($results->num_rows > 0) {
        while ($obj = $results->fetch_object()) {
            array_push($users, $obj);
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
        <h5 class="card-header">All Users</h5>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($users) > 0) {
                        foreach ($users as $user) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo ($user->id) ?></th>
                                <td><?php echo ($user->firstName) ?></td>
                                <td><?php echo ($user->lastName) ?></td>
                                <td><?php echo ($user->email) ?></td>
                                <td><?php echo ($user->phone) ?></td>
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