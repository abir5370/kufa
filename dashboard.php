<?php
session_start();
if(!isset($_SESSION['login_hoiche'])){ 
    header('location: login.php');
}
?>


<?php
require 'dashboard_header.php';
?>
<div class="container">
    <div class="row ">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">welcome, <?=$_SESSION['name']?></h3>
                </div>
                <div class="card-body">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit tempore nihil, sunt at cum dicta tenetur inventore nam error illo eaque assumenda vitae temporibus blanditiis delectus dolorum, aperiam nobis natus.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require 'dashboard_footer.php';
?>

<?php if(isset($_SESSION['login_hoiche_alert'])){ ?>
    <script>
         
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: 'Signed in successfully'
        })
    </script>
<?php } unset($_SESSION['login_hoiche_alert']) ?>