<?php
    
    session_start();
    require_once '../db/connect.php';
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $query = "SELECT * FROM `application` WHERE company_id='$id';";
    $result = mysqli_query($conn, $query);

    if(!$result){
        echo("something went wrong");
        exit();
    }
    
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,300;1,400;1,700&display=swap"
            rel="stylesheet" />

        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../styles/style.css" />
        <link rel="stylesheet" href="../styles/home.css" />

        <title>Home</title>
    </head>

    <body>
        <nav class="nav-bar">
            <h1>Job Finder <i class="fa fa-suitcase" aria-hidden="true"></i></h1>
            <a class="nav-btn" href="../index.html">Logout</a>
        </nav>
        <h1>MY JOB LISTINGS</h1>


        <div class="wrapper">
            <div class="notification">
                <div class="not">Notifications <i class="fa fa-bell" aria-hidden="true"></i></div>
                <div class="line"></div>
            </div>
            <div class="job-list-card">
                <?php 
                while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="job-list-card__job">
                    <div>
                        <a class="job-list-card__job-title" href="application.php?aid=<?php echo($row["id"])?>">
                            <?php echo($row["job_title"]) ?> </a>
                    </div>
                    <div class="job-list-card__short-desc"><?php echo($row["job_description"])?></div>
                </div>
                <?php } ?>
            </div>
            <div class="user-info">
                <div class="wrap1">
                    <div class="usr-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
                    <div class="wrap__inner">
                        <div class="user-info__username"><?php echo($username)?></div>
                        <div class="user-info__email"><?php echo($email)?></div>
                    </div>
                </div>
                <a class="prof-btn" href="profile.php">My profile</a>
                <a href="listajob.php" class="list-btn">List a new Job</a>

            </div>
        </div>
    </body>

</html>