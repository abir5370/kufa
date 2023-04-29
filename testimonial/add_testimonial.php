<?php
session_start();
if(!isset($_SESSION['login_hoiche'])){ 
    header('location: /New folder/tiger/login.php');
}
require '../db.php';

$select_testimonial = "SELECT * FROM testimonials";
$select_testimonial_result = mysqli_query($conn, $select_testimonial);

?>

<?php
require '../dashboard_header.php';
?>


<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                    <h3 class="card-title">Review list</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>si</th>
                        <th>name</th>
                        <th>info</th>
                        <th>content</th>
                        <th>image</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                        <?php foreach($select_testimonial_result as $key=>$testimonial) { ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$testimonial['name']?></td>
                                <td><?=$testimonial['avatar_info']?></td>
                                <td><?=$testimonial['content']?></td>
                                <td>
                                    <img width="100" src="../uploads/testimonial/<?=$testimonial['testmonial_image']?>" alt="">
                                </td>
                                <td>
                                    <a href="status_testimonial.php?id=<?=$testimonial['id']?>" class="btn btn-<?= $testimonial['status'] == 0?'secondary':'success' ?>"><?= $testimonial['status'] == 0?'deactive':'active' ?></a>
                                </td>
                                <td>
                                <a href="edit_edu.php?id=<?=$result['id']?>" class="btn btn-primary">edit</a>
                                <a value="delete_edu.php?id=<?=$result['id']?>" class="btn btn-danger del text-white">delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Review</h3>
            </div>
            <div class="card-body">
                <form action="testimonial_post.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="avatar_info" class="form-control" placeholder="avatar info">
                    </div>
                    <div class="form-group">
                        <input type="text" name="content" class="form-control" placeholder="content">
                    </div>
                    <div class="form-group">
                        <input type="file" name="testmonial_image" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img width="100" src="" alt="" id="blah">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php
    require '../dashboard_footer.php';
    ?>

<?php if(isset($_SESSION['extension'])) { ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['extension']?>',
        })
    </script>
<?php } unset($_SESSION['extension']) ?>

<?php if(isset($_SESSION['size'])) { ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['size']?>',
        })
    </script>
<?php } unset($_SESSION['size']) ?>

<?php if(isset($_SESSION['insert'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '<?=$_SESSION['insert']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['insert'])?>