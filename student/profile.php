<?php
    session_start();
    require_once '../db/connect.php';
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `student_details` WHERE user_id_s = '$id'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if( $count === 1){
        $row = mysqli_fetch_assoc($result);
        $bio = $row["bio"];
        $education = $row["education"];
        $contact = $row["contact"];
    }else{
        $bio = "";
        $education = "";
        $contact = "";
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,300;1,400;1,700&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="../styles/style.css" />

        <title>My Profile</title>
    </head>

    <body>
        <nav class="nav-bar">
            <h1>Job Finder <i class="fa fa-suitcase" aria-hidden="true"></i></h1>
            <a class="nav-btn" href="../index.html">Logout</a>
        </nav>
        <h2>My Profile</h2>

        <div class="card">
            <div class="username">
                <h3>Username : <?php echo($username) ?></h3>
            </div>
            <div class="email">
                <h3>E-mail : <?php echo($email) ?></h3>
            </div>
            <form class="profile-form" action="updateprofile.php" method="POST">
                <div class="form-control">

                </div>
                <div class="form-control">

                    <h6 for="bio">Bio:</h6>
                    <input type="text" name="bio" id="bio" value="<?php echo($bio) ?>" />
                </div>
                <div class="form-control">
                    <h6 for="education">Education:</h6>
                    <input type="text" name="education" id="education" value="<?php echo($education)?>">
                </div>
                <div class="form-control">
                    <h6 for="contact">Contact:</h6>
                    <input type="text" name="contact" id="contact" value="<?php echo($contact) ?>" />
                </div>
                <button class="btn">Update</button>
            </form>
        </div>
    </body>

</html>