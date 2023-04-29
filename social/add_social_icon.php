<?php
session_start();
if(!isset($_SESSION['login_hoiche'])){ 
    header('location: /New folder/tiger/login.php');
}
require '../db.php';

$select = "SELECT * FROM icons";
$select_result = mysqli_query($conn,$select);

?>
<?php
require '../dashboard_header.php';
?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Icon List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>si</th>
                        <th>icon</th>
                        <th>link</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                    <?php foreach($select_result as $key=>$result) { ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><i class="<?=$result['icon']?>"></i></td>
                            <td>
                                <a target="_blank" href="<?=$result['link']?>"><?=$result['link']?></a>
                            </td>
                            <td>
                                <a href="icon_status.php?id=<?=$result['id']?>" class="btn btn-<?= ($result['status'] == 0?'secondary':'success') ?>"><?= ($result['status'] == 0?'deactive':'active') ?></a>
                            </td>
                            <td>
                                <a value="delete_icon.php?id=<?=$result['id']?>" class="btn btn-danger del text-white">delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Icon</h3>
            </div>
            <div class="card-body">
                <form action="icon_post.php" method="post">
                    <?php
                        $fonts = array (
                            'fa-facebook-f',
                            'fa-facebook-official',
                            'fa-facebook-square',
                            'fa-instagram',
                            'fa-pinterest',
                            'fa-pinterest-p',
                            'fa-pinterest-square',
                            'fa-reddit',
                            'fa-skype',
                            'fa-snapchat',
                            'fa-snapchat-ghost',
                            'fa-snapchat-square',
                            'fa-telegram',
                            'fa-tumblr',
                            'fa-twitch',
                            'fa-twitter',
                            'fa-twitter-square',
                            'fa-whatsapp',
                            'fa-yahoo',
                            'fa-youtube',
                            'fa-youtube-play',
                            'fa-youtube-square',
                          );  
                    ?>
                    <div class="form-group">
                        <?php foreach($fonts as $icon) { ?>
                            <i style="margin-right:10px;font-size:30px" class="fa <?=$icon?>"></i>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="">Icon</label>
                        <input type="text" id="icon" class="form-control" name="icon">
                    </div>
                    <div class="form-group">
                        <label for="">Link</label>
                        <input type="text" class="form-control" name="link">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Add Icon">
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
    $('.fa').click(function(){
        var icon = $(this).attr('class');
        $('#icon').attr('value',icon);
    })
</script>

<?php if(isset($_SESSION['limit'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'warning',
        title: '<?=$_SESSION['limit']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['limit'])?>

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
