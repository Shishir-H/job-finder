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
        <title>Stdent profile</title>
    </head>

    <body>
        <nav>
            <h1>Job Finder</h1>
        </nav>
        <h2>Student Profile</h2>
        <div class="card">
            <div class="name"><?php echo($name) ?></div>
            <div class="email"><?php echo($email) ?></div>
            <h4>Bio:</h4>
            <div class="bio"><?php echo($bio) ?></div>
            <h4>Education:</h4>
            <div class="education"><?php echo($education) ?></div>
            <h4>Contact:</h4>
            <div class="contact"><?php echo($contact) ?></div>
        </div>
    </body>

</html>