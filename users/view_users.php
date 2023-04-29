<?php
session_start();
if(!isset($_SESSION['login_hoiche'])){ 
    header('location: /New folder/tiger/login.php');
}
require '../db.php';


$query = "SELECT * FROM users";
$result = mysqli_query($conn,$query);
$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<?php
require '../dashboard_header.php';
?>

<?php if($_SESSION['role'] != 0) { ?>
<div class="row">
    <div class="col-lg-8 <?php echo ($_SESSION['role'] != 1?'m-auto':'') ?>">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title text-white">User List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>si</th>
                            <th>name</th>
                            <th>email</th>
                            <th>role</th>
                            <th>Photo</th>
                            <?php if($_SESSION['role'] != 4) { ?>
                            <th>action</th>
                            <?php } ?>
                        </tr>
                        <?php foreach($posts as $key=>$post): ?>
                            <tr>
                                <td><?= $key+1 ?></td>
                                <td><?= $post['name']?></td>
                                <td><?= $post['email']?></td>
                                <td>
                                    <?php
                                    if($post['role'] == 1){
                                        echo "Admin";
                                    }
                                    elseif($post['role'] == 2){
                                        echo "Modarator";
                                    }
                                    elseif($post['role'] == 3){
                                        echo "Editor";
                                    }
                                    elseif($post['role'] == 4){
                                        echo "user";
                                    }
                                    else{
                                        echo "normal user";
                                    }

                                    ?>

                                </td>
                                <td><img width="50" src="../uploads/user/<?= $post['profile_photo']?>" alt=""></td>
                                <td>
                                     <?php if($_SESSION['role'] != 4) { ?>
                                    <a href="edit_users.php?id=<?=$post['id']?>" class="btn btn-success">edit</a>
                                    <?php } ?>
                                    <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>
                                        <a value="delete_users.php?id=<?=$post['id']?>" class="btn btn-danger del text-white">delete</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
    </div>
    <?php if($_SESSION['role'] == 1 || $_SESSION['role'] == 2)  { ?>
        <div class="col-lg-4">
            <div class="login-box">

            <?php if(isset($_SESSION['size'])) { ?>
            <div class="alert alert-warning"><?=$_SESSION['size']?></div>
            <?php } unset($_SESSION['size']) ?>
                                    
            <?php if(isset($_SESSION['extension'])) { ?>
                <div class="alert alert-warning"><?=$_SESSION['extension']?><div>
            <?php } unset($_SESSION['extension']) ?>
                        
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success"><?=$_SESSION['success']?></div>
            <?php } ?>

            <div class="login-box-body">
            <h3 class="login-box-msg">Sign Up</h3>
            <form action="../register_post.php" method="post" enctype="multipart/form-data">
                <div class="form-group has-feedback">
                    <input type="text" name="name" class="form-control sty1" value="<?=(isset($_SESSION['nodi'])?$_SESSION['nodi']:'')?>" placeholder="Name">

                    <?php if(isset($_SESSION['errors']['name'])) { ?>
                        <strong class="text-danger"><?=$_SESSION['errors']['name']?></strong>
                    <?php } ?>

                </div>
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control sty1" value="<?=(isset($_SESSION['kamal'])?$_SESSION['kamal']:'')?>" placeholder="Email">

                    <?php if(isset($_SESSION['errors']['email'])) { ?>
                        <strong class="text-danger"><?=$_SESSION['errors']['email']?></strong>
                    <?php } ?>
                    <?php if(isset($_SESSION['invalid'])) { ?>
                        <strong class="text-danger"><?=$_SESSION['invalid']?></strong>
                    <?php } ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control sty1" placeholder="Password">

                    <?php if(isset($_SESSION['errors']['password'])) { ?>
                        <strong class="text-danger"><?=$_SESSION['errors']['password']?></strong>
                    <?php } ?>

                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="confirm_password" class="form-control sty1" placeholder="Conform Password">

                    <?php if(isset($_SESSION['errors']['confirm_password'])) { ?>
                        <strong class="text-danger"><?=$_SESSION['errors']['confirm_password']?></strong>
                    <?php } ?>
                    <?php if(isset($_SESSION['pass'])) { ?>
                        <strong class="text-danger"><?=$_SESSION['pass']?></strong>
                    <?php } ?>

                </div>
                    <div class="form-group">
                        <label for="">profile photo</label>
                            <input type="file" name="profile_photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="form-group">
                        <img width="100" src="" alt="" id="blah">
                    </div>

                    <div class="form-group has-feedback">
                        <select name="role" class="form-control">
                            <option value=""> Select Role </option>
                            <option value="1">Admin</option>
                            <option value="2">Modarator</option>
                            <option value="3">Editor</option>
                            <option value="4">User</option>
                        </select>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4 m-t-1">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign UP</button>
                    </div>
                    <!-- /.col --> 
                </div>
            </form>
        </div>
    <?php } ?>
    <!-- /.login-box-body --> 
</div>
        </div>
    </div>
<?php } else { ?>
    <p>no data</p>

<?php } ?>
    <?php
    require '../dashboard_footer.php';
    ?>
    <script>
        $('.del').click(function(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('value');
                window.location.href = link;
            }
            })
        })
    </script>
   <?php if(isset($_SESSION['del'])){ ?>
    <script>
        Swal.fire(
            'Deleted!',
            '<?=$_SESSION['del']?>',
            'success'
            )
    </script>
    <?php } unset($_SESSION['del']);?>  



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if(isset($_SESSION['email_exist'])) { ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['email_exist']?>',
        })
    </script>
<?php } unset($_SESSION['email_exist']) ?>


<?php
unset($_SESSION['errors']);
unset($_SESSION['invalid']);
unset($_SESSION['pass']);
unset($_SESSION['nodi']);
unset($_SESSION['kamal']);
unset($_SESSION['success']);
?>


    