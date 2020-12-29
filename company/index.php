<?php
    
    session_start();
    require_once '../db/connect.php';
    $id = $_SESSION['id'];
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
        <title>Home</title>
    </head>

    <body>
        <nav>
            <h1>Job Finder</h1>
            <a href="profile.php">My profile</a>
        </nav>
        <h2>My Jobs Listings</h2>
        <div>
            <a href="listajob.php">List a new Job</a>
        </div>
        <div class="card">
            <div class="jobs">
                <!-- dummy - remove this later -->
                <div class="job">
                    <div class="title">This is Job Title</div>
                    <div class="short-desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit harum,
                        eveniet quos enim cum autem nobis dolor corrupti mollitia. Culpa?</div>
                </div>
                <?php 
                while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="job">
                    <div class="title"><?php echo($row["job_title"]) ?>
                    </div>
                    <div class="short-desc"><?php echo($row["job_description"])?></div>
                </div>
            </div>
            <?php } ?>
        </div>
        </div>
    </body>

</html>