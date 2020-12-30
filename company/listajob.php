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

        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'text'});</script>

        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,300;1,400;1,700&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="../styles/style.css" />

        <title>New Job</title>
    </head>

    <body>
        <nav>
            <h1>Job Finder</h1>
        </nav>
        <h2>List a new Job</h2>
        <div class="card">
            <div class="job">
                <form action="listajob.php" method="POST">
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