<?php
session_start();
if(!isset($_SESSION['login_hoiche'])){ 
    header('location: /New folder/tiger/login.php');
}
require '../db.php';

$select = "SELECT * FROM educations";
$results = mysqli_query($conn,$select);

?>

<?php
require '../dashboard_header.php';
?>

<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">education list</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>si</th>
                        <th>title</th>
                        <th>parcentage</th>
                        <th>year</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($results as $key=>$result) { ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$result['title']?></td>
                            <td><?=$result['percentage']?></td>
                            <td><?=$result['year']?></td>
                            <td>
                                <a href="edu_status.php?id=<?=$result['id']?>" class="btn btn-<?= ($result['status'] == 0?'secondary':'success') ?>"><?= ($result['status'] == 0?'deactive':'active') ?></a>
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
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">add education</h3>
            </div>
            <div class="card-body">
                <form action="edu_post.php" method="post">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <input type="text" name="percentage" class="form-control" placeholder="percentage">
                    </div>
                    <div class="form-group">
                        <input type="text" name="year" class="form-control" placeholder="year">
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