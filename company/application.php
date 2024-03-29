<?php
    
    session_start();
    require_once '../db/connect.php';
    $id = $_SESSION['id'];
    $aid = $_GET['aid'];
    
    if(isset($_GET['sid'])){
    $sid = $_GET["sid"];
     $query = "UPDATE `applied`
      SET `status` = 'selected'
    WHERE `applied`.`application_id` = '$aid' AND `applied`.`student_id` = '$sid';";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo("something went wrong");
        exit();
    }   
    }

    $query = "SELECT * FROM `application` WHERE company_id='$id' AND id='$aid';";
    $result = mysqli_query($conn, $query);

    if(!$result){
        echo("something went wrong");
        exit();
    }
    $row1 = mysqli_fetch_assoc($result);
    
    $query = "SELECT * 
    FROM `applied`, user 
    WHERE application_id='$aid' AND user.id = applied.student_id";
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../styles/style.css" />

        <title>Application</title>
    </head>

    <body>
        <nav class="nav-bar">
            <h1>Job Finder  <i class="fa fa-suitcase" aria-hidden="true"></i></h1>
            <a class="nav-btn" href="../index.html">Logout</a>
        </nav>
        <h2>Application</h2>

        <div class="card" style="width: 70%;">
            <div class="job-title"><?php echo($row1['job_title'])?></div>
            <div class="job-desc"><?php echo($row1['job_description'])?></div>
        </div>
        <h2>Applicants:</h2>
        <div class="card">
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <div class="applicant">
                <div class="applicant-name"><a href="studentprofile.php?id=<?php echo($row["id"]); ?>">
                        <?php echo($row["username"]); ?></a></div>
                <?php if($row["status"] === "selected"){ ?>
                <i class="application-status">selected✔</i>
                <?php }else{?>
                <a class="application-status" href="application.php?aid=<?php echo($aid)?>&sid=<?php echo($row["id"])?>">select</a>
                <?php }?>
            </div>
            <?php } ?>
        </div>
    </body>

</html>