<?php
    
    session_start();
    require_once '../db/connect.php';
    $id = $_SESSION['id'];
    $applicationid = $_GET["id"];
    if(isset($_GET["apply"])){
        $query = "INSERT INTO `applied` 
        (`application_id`, `student_id`, `status`)
        VALUES ('$applicationid', '$id', 'applied');";
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo("something went wrong");
            exit();
        }
    }
    $query = "SELECT * FROM `applied`
             WHERE student_id = '$id' AND application_id ='$applicationid'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $applied = true;
    }else{
        $applied = false;
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


        <title>Job Details</title>
    </head>

    <body>
        <nav class="nav-bar">
            <h1>Job Finder</h1>
        </nav>
        <h2>Job Details</h2>
    </body>

    <div class="card">
        <div class="job-title">Title</div>
        <div class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, dolore nihil consequatur qui
            debitis saepe. Repellat blanditiis aut eligendi? Totam?</div>
        <?php if($applied){ ?>
        <div class="applied">applied✔</div>
        <div class="status">Status:

            <?php if($row['status'] === "selected"){ ?>
            Selected
            <?php }else{ ?>
            Pending
            <?php } ?>
        </div>
        <?php }else{ ?>
        <a href="job-details.php?apply=true&id=<?php echo($_GET['id'])?>">apply</a>
        <?php } ?>
    </div>

</html>