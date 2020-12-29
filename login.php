<?php 
    session_start();
    require_once './db/connect.php';
    $email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);


    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $count = mysqli_num_rows($result);

    if($count == 1){
        
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];

        if($row['role'] === "student"){
            header("Location: student/");
        }else{
            header("Location: company/");
        }

    }else{
        echo("<div class='alert alert-danger mt-3 text-center'>Invalid Email/Password</div>");
    }
?>