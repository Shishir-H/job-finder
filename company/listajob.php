<?php
    if(isset($_POST["title"])){
    
    session_start();
    require_once '../db/connect.php';
    $id = $_SESSION['id'];

	$title = mysqli_real_escape_string($conn,$_POST['title']);
    $desc = mysqli_real_escape_string($conn,$_POST['description']);

    $query = "INSERT INTO 
    `application` (`company_id`, `job_title`, `job_description`)
     VALUES ('$id', '$title', '$desc');";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo("something went wrong");
    }else{
        header("Location: index.php");
    }
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,300;1,400;1,700&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../styles/style.css" />

        <title>New Job</title>
    </head>

    <body>
        <nav class="nav-bar">
            <h1>Job Finder  <i class="fa fa-suitcase" aria-hidden="true"></i></h1>
            <a class="nav-btn" href="../index.html">Logout</a>
        </nav>
        <h2>List a new Job</h2>
        <div class="card">
            <div>
                <form class="profile-form" action="listajob.php" method="POST">
                    <label for="title">Job Title</label>
                    <input type="text" name="title" id="title">
                    <label for="description">Job Description</label>
                    <input type="text" name="description" id="description">
                    <button class="btn">Done</button>
                </form>
            </div>
        </div>
    </body>

</html>