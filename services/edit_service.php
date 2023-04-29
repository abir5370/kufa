<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM services WHERE id=$id";
$select_result = mysqli_query($conn,$select);
$after_assoc = mysqli_fetch_assoc($select_result);

?>
<?php
    require '../dashboard_header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Service Content</h3>
            </div>
            <div class="card-body">
                <form action="update_service.php" method="post">
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
                    <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                    <div class="form-group">
                        <input type="text" id="icon_input" name="icon" class="form-control" placeholder="icon" value="<?=$after_assoc['icon']?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="title" value="<?=$after_assoc['title']?>">
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="desp" class="form-control" placeholder="description"><?=$after_assoc['desp']?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="update">
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