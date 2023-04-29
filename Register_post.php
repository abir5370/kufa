<?php
session_start();
require 'db.php';
$errors = [];
$field_names = ['name'=>'name is required','email'=>'email is required','password'=>'password is required','confirm_password'=>'confirm password is required'];
foreach($field_names as $field_name=>$message){
    if(empty($_POST[$field_name])){
        $errors[$field_name] = $message;
    }
}
if(count($errors) == 0){
    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $_SESSION['invalid'] = 'invalid email address';
        header('location:users/view_users.php');
    }
    else if($_POST['password'] != $_POST['confirm_password']){
        $_SESSION['pass'] ='Password and Confirm password does not match';
        header('location:users/view_users.php');
    }
    else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $after_password = password_hash($password,PASSWORD_DEFAULT);
        $role = $_POST['role'];
        


        $select_email = "SELECT count(*) as email_exist FROM users WHERE email='$email'";
        $select_email_result = mysqli_query($conn,$select_email);
        $after_assoc = mysqli_fetch_assoc($select_email_result);

        if($after_assoc['email_exist'] ==1){
            $_SESSION['email_exist'] = 'email alredy exist!';
            header('location: users/view_users.php');
        }
        else{

            $uploaded_file = $_FILES['profile_photo'];
            $after_explode = explode('.',$uploaded_file['name']);
            $extension = end($after_explode);

            $allowed_extension = array('jpg','png','gif','webp');
            if(in_array($extension,$allowed_extension)){
                if($uploaded_file['size'] <= 10000000){
                    $query = "INSERT INTO users(name,email,password,role)VALUES('$name','$email','$after_password ','$role')";
                    mysqli_query($conn,$query);
                    $id = mysqli_insert_id($conn);
                    $file_name = $id.'.'.$extension;
                    $new_location = 'uploads/user/'.$file_name;
                    move_uploaded_file($uploaded_file['tmp_name'],$new_location);
                    $update = "UPDATE users SET profile_photo='$file_name' WHERE id=$id";
                    $update_result = mysqli_query($conn,$update);
                    $_SESSION['success'] = 'register is successfully';
                    header('location: users/view_users.php');
                        
                }
                else{
                    $_SESSION['size']  = 'file size too long!';
                    header('location: users/view_users.php');
                }
            }
            else{
                $_SESSION['extension'] = 'invalid extension!';
                header('location: users/view_users.php');
            }
        }

    }

}     
else{
    $_SESSION['errors'] = $errors;
    $_SESSION['nodi'] = $_POST['name'];
    $_SESSION['kamal'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    header('location: register.php');
}
?>