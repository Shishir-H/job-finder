<?php
    session_start();
    require_once '../db/connect.php';
    $id = $_SESSION['id'];
    $details =  mysqli_real_escape_string($conn, $_POST['details']);
    $address =  mysqli_real_escape_string($conn, $_POST['address']);
   

    $query = "SELECT * FROM `company_details` WHERE user_id_c = '$id'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if( $count === 1){
        $query = "UPDATE `company_details` 
        SET `details` = '$details', `address` = '$address' 
        WHERE `company_details`.`user_id_c` = '$id';";
        $result = mysqli_query($conn, $query);
    }else{
        $query = "INSERT INTO   
        `company_details` (`user_id_c`, `address`, `details`) 
        VALUES ('$id', '$address', '$details');";
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