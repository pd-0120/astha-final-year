<?php
$message    = "";
$level      = "";

if(isset($_SESSION['flash_message'])) {
    $message = $_SESSION['flash_message'];
    $level = $_SESSION['flash_message_level'];
    unset($_SESSION['flash_message']);
    unset($_SESSION['flash_message_level']);
}
?>

<?php if ($message) { ?>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="alert alert-<?php echo $level;?>" role="alert">
                    <?php echo $message; ?>
                </div>
            </div>
        </div>
<?php } ?>