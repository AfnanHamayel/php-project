<?php
session_start() ;  
include __DIR__ . '/includes/db.php';

?>

<?php

if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id']; // id 
    $email = $_POST['edit_email'];// email 

    $password = $_POST['edit_password']; // password in db   
    $opassword = $_POST['oldpassword'];   // old password that user enter  
    $cpassword = $_POST['confirmpassword'];    
    $npassword = $_POST['newpassword']; 

    $hashpassword=password_hash($npassword,PASSWORD_DEFAULT) ;   
    

    if ($npassword === $cpassword && $password === $opassword ) { 

        $query = "UPDATE main_admin SET  email='$email', password='$hashpassword' WHERE id='$id' ";
        $query_run = mysqli_query($mysqli, $query); 

        if ($query_run) {
            $_SESSION['status'] = "Your Data is Updated";     
            $_SESSION['status_code'] = "success"; 
            header('Location: setting.php');   
        } else {
            $_SESSION['status'] = "Your Data is NOT Updated";   
            $_SESSION['status_code'] = "error";
            header('Location: setting.php');
        }
    }

    else 
    {
        $_SESSION['status'] = "Password and Confirm Password Does Not Match";
        $_SESSION['status_code'] = "warning";
        header('Location:setting.php');   
    }
}



?> 