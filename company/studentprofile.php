<?php 
    require_once '../db/connect.php';
   
    $id = $_GET['id'];
    $query = "SELECT *
    FROM `user`
    LEFT OUTER  JOIN student_details
    ON user.id = student_details.user_id_s
    WHERE user.id ='$id'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    
    $row = mysqli_fetch_assoc($result);
    $name = $row["username"];
    $email =  $row["email"];
    $bio = $row["bio"];
    $education = $row["education"];
    $contact = $row["contact"];   


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

        <title>Stdent profile</title>
    </head>

    <body>
    <nav class="nav-bar">
            <h1>Job Finder <i class="fa fa-suitcase" aria-hidden="true"></i></h1>
            <a class="nav-btn" href="../index.html">Logout</a>
        </nav>
        <h2>Student Profile</h2>
        <div class="card">
            <div class="username"><?php echo($name) ?></div>
            <div class="email"><?php echo($email) ?></div>
            
            <div class="student-details">
                <h4>Bio:</h4>
                <?php echo($bio) ?>
            </div>
            
            <div class="student-details">
                <h4>Education:</h4>
                <?php echo($education) ?>
            </div>
            
            <div class="student-details">
                <h4>Contact:</h4>
                <?php echo($contact) ?>
            </div>
        </div>
    </body>

</html>