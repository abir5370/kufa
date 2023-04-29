<?php
session_start();
require '../db.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $after_password = password_hash($password,PASSWORD_DEFAULT);
    $role = $_POST['role'];

    if(empty($password)){
        $uploaded_file = $_FILES['profile_photo'];
        if($uploaded_file['name'] == ''){
            $query = "UPDATE users SET name='$name', email='$email',role='$role' WHERE id=$id";
            $result = mysqli_query($conn,$query);
            $_SESSION['success'] = 'user updated!';
            header('location: edit_users.php?id='.$id);
        }
        else{
            $after_explode = explode('.',$uploaded_file['name']);
            $extension = end($after_explode);
            $allowed_extension = array('jpg','png','gif','webp');
            if(in_array($extension,$allowed_extension)){
                if($uploaded_file['size'] <= 10000000){
                    $select = "SELECT * FROM users WHERE id=$id";
                    $select_result = mysqli_query($conn,$select);
                    $after_assoc = mysqli_fetch_assoc($select_result);
                    $delete_form = '../uploads/user/'.$after_assoc['profile_photo'];
                    unlink($delete_form);

                    $file_name = $id.'.'.$extension;
                    $new_location = '../uploads/user/'.$file_name;
                    move_uploaded_file($uploaded_file['tmp_name'],$new_location);
                    $query = "UPDATE users SET name='$name', email='$email',profile_photo='$file_name',role='$role' WHERE id=$id";
                    $result = mysqli_query($conn,$query);
                    $_SESSION['success'] = 'user updated!';
                    header('location: edit_users.php?id='.$id);
                }
                else{
                    $_SESSION['size'] = 'file size too long!';
                    header('location: edit_users.php?id='.$id);
                }
            }
            else{
                $_SESSION['extension'] = 'invalid extension';
                header('location: edit_users.php?id='.$id);
            }
        }    
    }
    else{
        $uploaded_file = $_FILES['profile_photo'];
        if($uploaded_file['name'] ==''){
            $query = "UPDATE users SET name='$name',email='$email',password='$after_password',role='$role' WHERE id=$id";
            $result = mysqli_query($conn,$query);
            $_SESSION['success'] = 'user updated!';
            header('location: edit_users.php?id='.$id);
        }
        else{
            $after_explode  = explode('.',$uploaded_file['name']);
            $extension = end($after_explode);
            $allowed_extension = array('jpg','png','gif','webp');
            if(in_array($extension,$allowed_extension)){
            if($uploaded_file['size'] <= '10000000'){
                $select = "SELECT * FROM users WHERE id=$id";
                $select_result = mysqli_query($conn,$select);
                $after_assoc = mysqli_fetch_assoc($select_result);
                $delete_form = '../uploads/user/'.$after_assoc['profile_photo'];
                unlink($delete_form);

                $file_name = $id.'.'.$extension;
                $new_location = '../uploads/user/'.$file_name;
                move_uploaded_file($uploaded_file['tmp_name'],$new_location);
                $query = "UPDATE users SET name='$name',email='$email',password='$after_password',profile_photo='$file_name',role='$role' WHERE id=$id";
                $result = mysqli_query($conn,$query);
                $_SESSION['success'] = 'user updated!';
                header('location: edit_users.php?id='.$id);
            }
            else{
                $_SESSION['size'] = 'file size too long!';
                header('location: edit_users.php?id='.$id);
            }
        }
        else{
            $_SESSION['extension'] = 'invalid extension';
            header('location: edit_users.php?id='.$id);
        }
        }
    }

}


?>