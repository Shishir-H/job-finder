<?php 
    require_once './db/connect.php';
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
    $role = mysqli_real_escape_string($conn,$_POST['role']);

    $query = "INSERT INTO `user` 
            (`username`, `email`, `password`, `role`)
             VALUES ('$username', '$email', '$password', '$role')";

    $result = mysqli_query($conn, $query);
    
    if($result){
         header("Location: login.html");
    }
?>