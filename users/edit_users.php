<?php
session_start();
require '../db.php';

$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn,$query);
$post = mysqli_fetch_assoc($result);

?>


<?php
require '../dashboard_header.php';
?>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4">
                <div class="card">

                    <?php if(isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success"><?=$_SESSION['success']?></div>
                    <?php } unset($_SESSION['success']); ?>

                    <div class="card-header bg-primary">
                        <h3 class="card-title">user edit</h3>
                    </div>
                    <div class="card-body">
                        <form action="update_user.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?=$post['id']?>">
                            <div class="form-group">
                                <label for="">name</label>
                                <input type="text" class="form-control" name="name" value="<?=$post['name']?>">
                            </div>
                            <div class="form-group">
                                <label for="">email</label>
                                <input type="email" class="form-control" name="email" value="<?=$post['email']?>">
                            </div>
                            <div class="form-group">
                                <label for="">password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="">Profile Photo</label>
                                <input type="file" class="form-control" name="profile_photo">

                                <?php if(isset($_SESSION['size'])) { ?>
                                    <div class="alert alert-warning"><?=$_SESSION['size']?></div>
                                <?php } unset($_SESSION['size']); ?>
                                <?php if(isset($_SESSION['extension'])) { ?>
                                    <div class="alert alert-warning"><?=$_SESSION['extension']?></div>
                                <?php } unset($_SESSION['extension']); ?>

                            </div>
                            <div class="form-group">
                                <img width="100" src="../uploads/user/<?=$post['profile_photo']?>" alt="">
                            </div>

                            <div class="form-group has-feedback">
                                <select name="role" class="form-control">
                                    <option value=""> Select Role </option>
                                    <option <?php echo ($post['role'] == 1?'selected':'' ) ?> value="1">Admin</option>
                                    <option <?php echo ($post['role'] == 2?'selected':'' ) ?> value="2">Modarator</option>
                                    <option <?php echo ($post['role'] == 3?'selected':'' )  ?> value="3">Editor</option>
                                    <option <?php echo ($post['role'] == 4?'selected':'') ?> value="4">User</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-success mt-2" name="submit" value="update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require '../dashboard_footer.php';
?>
