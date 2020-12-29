<?php
    session_start();
    require_once '../db/connect.php';
    $id = $_SESSION['id'];
    $bio =  mysqli_real_escape_string($conn, $_POST['bio']);
    $education =  mysqli_real_escape_string($conn, $_POST['education']);
    $contact =  mysqli_real_escape_string($conn, $_POST['contact']);

    $query = "SELECT * FROM `student_details` WHERE user_id_s = '$id'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if( $count === 1){
        $query = "UPDATE `student_details` 
        SET `bio` = '$bio', `education` = '$education', `contact` = '$contact' 
        WHERE `student_details`.`user_id_s` = '$id';";
        $result = mysqli_query($conn, $query);
    }else{
        $query = "INSERT INTO   
        `student_details` (`user_id_s`, `bio`, `education`, `contact`) 
        VALUES ('$id', '$bio', '$education', '$contact');";
        $result = mysqli_query($conn, $query); 
    }
    
    if($result){
         header("Location: profile.php");
    }else{
        $err = mysqli_error($conn);
       echo("Somethig went wrong!");
       echo($err);
    }
?>