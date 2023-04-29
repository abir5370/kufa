<?php
session_start();
require '../db.php';

$id = $_GET['id'];
$select_banner = "SELECT * FROM banner_contents WHERE id=$id";
$result  = mysqli_query($conn,$select_banner);
$after_assoc = mysqli_fetch_assoc($result);

?>
<?php
require '../dashboard_header.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">

                <?php if(isset($_SESSION['update'])) { ?>
                    <div class="alert alert-success"><?=$_SESSION['update']?></div>
                <?php } unset($_SESSION['update']) ?>

                <div class="card-header bg-primary text-white">
                    <h3 class="card-title text-center">Edit Banners</h3>
                </div>
                <div class="card-body">
                    <form action="update_banner.php" method="post">
                        <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                        <div class="form-group">
                            <input type="text" class="form-control" name="sub_title" value="<?=$after_assoc['sub_title']?>" placeholder="sub title">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" value="<?=$after_assoc['title']?>" placeholder="title">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="desp" value="<?=$after_assoc['desp']?>" placeholder="description">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update Content</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require '../dashboard_footer.php';
?>