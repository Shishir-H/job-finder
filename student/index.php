<?php
    
    session_start();
    require_once '../db/connect.php';
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `application`;";
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
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,300;1,400;1,700&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="../styles/style.css" />

        <title>Home</title>
    </head>

    <body>
        <nav class="nav-bar">
            <h1>Job Finder</h1>
            <a class="nav-btn" href="profile.php">My profile</a>
        </nav>
        <h2>Job Listings</h2>

        <div class="card">
            <!-- <div class="jobs"> -->
                <!-- dummy- -->
                <!-- <div class="job">
                    <div class="title"><a href="job-details.php">This is Job Title</a></div>
                    <div class="short-desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit harum,
                        eveniet quos enim cum autem nobis dolor corrupti mollitia. Culpa?</div>
                </div> -->
                <?php 
                while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="job">
                    <div class="job-title">
                        <a href="job-details.php/?id=<?php echo($row["id"]) ?>"><?php echo($row["job_title"]) ?></a>
                    </div>
                    <div class="short-desc"><?php echo($row["job_description"])?></div>
                </div>
            <!-- </div> -->
            <?php } ?>
        </div>
        </div>
    </body>

</html>