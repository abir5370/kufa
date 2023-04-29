<?php
session_start();
if(!isset($_SESSION['login_hoiche'])){ 
    header('location: /New folder/tiger/login.php');
}
require '../db.php';

$select_banner = "SELECT * FROM banner_contents";
$result = mysqli_query($conn, $select_banner);
$banners = mysqli_fetch_all($result,MYSQLI_ASSOC);

$selec_img = "SELECT * FROM banner_images";
$select_img_result = mysqli_query($conn,$selec_img);

?>

<?php
require '../dashboard_header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Banner Content List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>si</th>
                            <th>sub title</th>
                            <th>title</th>
                            <th>description</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                        <?php foreach($banners as $key=>$banner) { ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$banner['sub_title']?></td>
                                <td><?=$banner['title']?></td>
                                <td><?=$banner['desp']?></td>
                                <td>
                                    <a href="banner_status.php?id=<?=$banner['id']?>" class="btn btn-<?= ($banner['status'] == 0?'secondary':'success') ?>"><?= ($banner['status'] == 0?'deactive':'active') ?></a>
                                </td>
                                <td>
                                    <a href="edit_banner.php?id=<?=$banner['id']?>" class="btn btn-success">edit</a>
                                    <a value="delete_banner.php?id=<?=$banner['id']?>" class="btn btn-danger del text-white">delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if(mysqli_num_rows($result) == '0') { ?>
                            <tr>
                                <td class="text-center" colspan="5">
                                    <strong>No data found</strong>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">Banner Image List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>si</th>
                            <th>image</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                        <?php foreach($select_img_result as $key=>$img) { ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td>
                                    <img width="100" src="../uploads/banner/<?=$img['banner_image']?>" alt="">
                                </td>
                                <td>
                                    <a href="banner_img_status.php?id=<?=$img['id']?>" class="btn btn-<?= ($img['status'] == 0?'secondary':'success') ?>"><?= ($img['status'] == 0?'deactive':'active') ?></a>
                                </td>
                                <td>
                                    <a value="banner_img_delete.php?id=<?=$img['id']?>" class="btn btn-danger del text-white">delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if(mysqli_num_rows($select_img_result) == '0') { ?>
                            <tr>
                                <td class="text-center" colspan="4">
                                    <strong>No Found Data</strong>
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
                    <h3 class="card-title">Add Banners</h3>
                </div>
                <div class="card-body">
                    <form action="banner_post.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="sub_title" placeholder="sub title">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="title">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="desp" placeholder="description">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="add content" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-5">

            <!-- <?php if(isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success"><?=$_SESSION['success']?></div>
                <?php } unset($_SESSION['success']) ?> -->

                <div class="card-header">
                    <h3 class="card-title">Add Banner Image</h3>
                </div>
                <div class="card-body">
                    <form action="banner_img_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" class="form-control" name="banner_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img width="100" src="" alt="" id="blah">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Add image" class="btn btn-success">
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

<?php if(isset($_SESSION['successfull'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '<?=$_SESSION['successfull']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['successfull'])?>

<?php if(isset($_SESSION['add'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '<?=$_SESSION['add']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['add'])?>


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