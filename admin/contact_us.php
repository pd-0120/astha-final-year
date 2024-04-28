<?php require_once 'nav.php' ?>
<?php 
    $queries = [];
    $sql = "SELECT  * from contactUs";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($obj = $result->fetch_object()) {
            array_push($queries, $obj);
        }
    }
?>
<div class="container">
    <div class="card mt-5">
        <h5 class="card-header">People reached out us with queries</h5>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Query</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($queries) >0) {
                        foreach($queries as $quary) {
                            ?>
                                <tr>
                                    <td><?php echo($quary->id)?></td>
                                    <td><?php echo($quary->name)?></td>
                                    <td><?php echo($quary->email)?></td>
                                    <td><?php echo($quary->contactNumber) ?></td>
                                    <td><?php echo($quary->query) ?></td>
                                </tr>
                            <?php 
                        }
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once 'footer.php' ?>