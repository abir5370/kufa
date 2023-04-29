<?php
session_start();
if(!isset($_SESSION['login_hoiche'])){ 
    header('location: /New folder/tiger/login.php');
}
require '../db.php';

$select = "SELECT * FROM abouts";
$select_result = mysqli_query($conn,$select);
$select_after_assoc = mysqli_fetch_assoc($select_result);
?>
<?php
require '../dashboard_header.php';
?>
<div class="row justify-content-center">
    <div class="col-lg-6">
    <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit About</h3>
            </div>
            <div class="card-body">
                <form action="about_update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value=<?=$select_after_assoc['id']?>>
                   <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" value="<?=$select_after_assoc['title']?>">
                   </div>
                   <div class="form-group">
                        <label for="">description</label>
                        <textarea type="text" name="desp" class="form-control"><?=$select_after_assoc['desp']?></textarea>
                   </div>
                   <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <img width="100" src="/New folder/tiger/uploads/about/<?=$select_after_assoc['image']?>" id="blah" alt="">
                   </div>
                   <div class="form-group">
                        <input type="submit" class=" btn btn-success" value="update about">
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

<?php if(isset($_SESSION['success'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '<?=$_SESSION['success']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['success'])?>


