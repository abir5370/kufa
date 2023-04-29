<?php
session_start();
require '../db.php';

$id =$_GET['id'];

$select = "SELECT * FROM educations WHERE id=$id";
$select_result = mysqli_query($conn,$select);
$after_assoc = mysqli_fetch_assoc($select_result);

?>

<?php
require '../dashboard_header.php';
?>

<div class="row justify-content-center">
<div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit education</h3>
            </div>
            <div class="card-body">
                <form action="edu_update.php" method="post">
                    <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Title" value="<?=$after_assoc['title']?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="percentage" class="form-control" placeholder="percentage" value="<?=$after_assoc['percentage']?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="year" class="form-control" placeholder="year" value="<?=$after_assoc['year']?>">
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

<?php if(isset($_SESSION['update'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '<?=$_SESSION['update']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['update'])?>