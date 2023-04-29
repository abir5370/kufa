<?php
session_start();
if(!isset($_SESSION['login_hoiche'])){ 
    header('location: /New folder/tiger/login.php');
}
require '../db.php';

$select_work = "SELECT * FROM works";
$select_work_result = mysqli_query($conn,$select_work);


?>
<?php
    require '../dashboard_header.php';
?>
<style>
    .abc span {
        display: none;
    };
    
</style>
<div class="row">
    <div  class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Work List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>si</th>
                        <th>category</th>
                        <th width="100">project 
                            name</th>
                        <th width="150">title</th>
                        <th width="165">description</th>
                        <th>image</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                    <?php foreach($select_work_result as $key=>$work) { ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$work['category']?></td>
                            <td><?=$work['project_name']?></td>
                            <td><?=$work['title']?></td>
                            <td>
                                <?=substr($work['desp'], 0, 20)?>
                                <span style="cursor: pointer;" value="<?=substr($work['desp'], 21)?>" class="abc"><i style="color: blue;">read more</i></span>
                            </td>
                            <td><img width="100" src="../uploads/work/<?=$work['project_image']?>" alt=""></td>
                            <td>
                                <a href="status_work.php?id=<?=$work['id']?>" class="btn btn-<?=$work['status'] == 0?'secondary':'success'?>"><?=$work['status'] == 0?'deactive':'active'?></a>
                            </td>
                            <td>
                                <a href="" class="btn btn-success">edit</a>
                                <a value="delete_work.php?id=<?=$work['id']?>" class="btn btn-danger del text-white">delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Work</h3>
            </div>
            <div class="card-body">
                <form action="work_post.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="category" class="form-control" placeholder="category">
                    </div>
                    <div class="form-group">
                        <input type="text" name="project_name" class="form-control" placeholder="project name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="title">
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="desp" class="form-control" placeholder="description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="project_image" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
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

<script>
    $('.abc').click(function(){
        var data = $(this).attr('value');
        $(this).html(data);
    });
</script>

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