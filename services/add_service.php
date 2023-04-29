<?php
session_start();
if(!isset($_SESSION['login_hoiche'])){ 
    header('location: /New folder/tiger/login.php');
}
require '../db.php';

$select = "SELECT * FROM services";
$select_result = mysqli_query($conn,$select);


?>
<?php
    require '../dashboard_header.php';
?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">service content list</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>si</th>
                        <th>icon</th>
                        <th>title</th>
                        <th>description</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($select_result as $key=>$result) { ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$result['icon']?></td>
                            <td><?=$result['title']?></td>
                            <td>
                                <?=substr($result['desp'], 0, 20)?>
                                <span style="cursor:pointer;" class="abc" value="<?=substr($result['desp'],21)?>"><i style="color:blue;">Read More</i></span>
                            </td>
                            <td>
                                <a href="status_service.php?id=<?=$result['id']?>" class="btn btn-<?=$result['status'] == 0?'secondary':'success'?>"><?=$result['status'] == 0?'deactive':'active'?></a>
                            </td>
                            <td>
                                <a href="edit_service.php?id=<?=$result['id']?>" class="btn btn-success">edit</a>
                                <a value="delete_service.php?id=<?=$result['id']?>" class="btn btn-danger del text-white">delete</a>
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
                <h3 class="card-title">Add Service Content</h3>
            </div>
            <div class="card-body">
                <form action="service_post.php" method="post">
                    <div>
                        <?php
                            $fonts = array (

                                'fa-yelp',
                                'fa-yen',
                                'fa-yoast',
                                'fa-youtube',
                                'fa-youtube-play',
                                'fa-youtube-square',
                                'fa-viadeo',
                                'fa-viadeo-square',
                                'fa-video-camera',
                                'fa-vimeo',
                                'fa-vimeo-square',
                                'fa-vine',
                                'fa-vk',
                                'fa-volume-control-phone',
                                'fa-volume-down',
                                'fa-volume-off',
                                'fa-volume-up',
                                'fa-warning',
                                'fa-wechat',
                                'fa-weibo',
                                'fa-weixin',
                                'fa-whatsapp',
                                'fa-wheelchair',
                                'fa-wheelchair-alt',
                                'fa-wifi',
                                'fa-wikipedia-w',
                            );
                        ?>
                       <?php foreach($fonts as $icon) { ?>
                            <i style="margin: 5px; font: size 30px;" class="fa <?=$icon;?>"></i>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <input type="text" id="icon_input" name="icon" class="form-control" placeholder="icon">
                    </div>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="title">
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="desp" class="form-control" placeholder="description"></textarea>
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
    $('.fa').click(function (){
        var icon = $(this).attr('class');
        $('#icon_input').attr('value', icon);
        
    });
</script>

<script>
    $('.abc').click(function(){
        var data = $(this).attr('value');
        $(this).html(data);
    });
</script>

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